<?php

namespace App\Http\Controllers;

use App\Models\KontenNavbar;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class KontenNavbarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KontenNavbar::select(
                'konten_navbar.*',
                'submenu.submenu as konten_name'
            )
            ->join('submenu', 'konten_navbar.submenu_id', '=', 'submenu.id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row){
                    if ($row->img) {
                        $url = asset('img_konten/'.$row->img);
                        $judul = e($row->judul);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$judul.'">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('konten', function($row){
                    return strip_tags($row->konten);
                })
                ->addColumn('action', function($row){
                    $editUrl = route('kontennavbar.edit', $row->id);
                    $btn = '<a onclick="openEditModal('.$row->id.')" class="edit btn btn-icon icon-left btn-warning btn-sm" style="padding: 10px 10px; font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                            </a>
                            <a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </a>';
                    return $btn;
                })
                ->rawColumns(['action', 'img', 'konten'])
                ->make(true);
        } 
        
        $submenuList = \App\Models\Submenu::where('is_dynamic', 1)
                ->orderBy('urutan')
                ->get();

        return view('navbar.konten.index', compact('submenuList'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'judul' => 'required|string|max:2500',
            'konten' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'konten.required'    => 'Konten wajib diisi.',
            'img.image'   => 'File yang diunggah harus berupa gambar.',
            'img.mimes'   => 'Gambar harus berformat: jpeg, png, jpg, gif, svg, atau webp.',
            'img.max'     => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }

        if ($request->hasFile('img')) {
                $file1 = $request->file('img');
                $fileName1 = time().'_imgkonten.'.$file1->getClientOriginalExtension();
                $file1->move(public_path('img_konten'), $fileName1);
            } else {
                $fileName1 = null;
            }


        KontenNavbar::create([
            'submenu_id' => $request->submenu_id,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'img' => $fileName1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function destroy($id)
    {
        try {
             $konten = KontenNavbar::findOrFail($id);
             $konten->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }

    public function edit($id)
    {
        $kontenNavbar = KontenNavbar::findOrFail($id);
        $submenuList = Submenu::where('is_dynamic', 1)->orderBy('urutan')->get();

        return response()->json([
            'kontenNavbar' => $kontenNavbar,
            'submenuList'  => $submenuList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RawatJalan  $rawatJalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'submenu_id' => 'required|exists:submenu,id',
            'judul' => 'required|string|max:2500',
            'konten' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ], [
            'submenu_id.required' => 'Submenu wajib dipilih.',
            'submenu_id.exists' => 'Submenu tidak valid.',
            'judul.required' => 'Judul wajib diisi.',
            'konten.required' => 'Konten wajib diisi.',
            'img.image' => 'File yang diunggah harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
            'img.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        $kontenNavbar = KontenNavbar::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($kontenNavbar->img && file_exists(public_path('img_konten/'.$kontenNavbar->img))) {
                unlink(public_path('img_konten/'.$kontenNavbar->img));
            }

            $file1 = $request->file('img');
            $fileName1 = time().'_img.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('img_konten'), $fileName1);
        } else {
            $fileName1 = $kontenNavbar->img;
        }

        $kontenNavbar->update([
            'submenu_id' => $request->submenu_id,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'img' => $fileName1,
        ]);

        return response()->json(['success' => true]);
    }
}
