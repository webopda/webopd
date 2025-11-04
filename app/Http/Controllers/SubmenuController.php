<?php

namespace App\Http\Controllers;

use App\Models\Submenu;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Submenu::select(
                'submenu.*',
                'navbar.menu as menu_name'
            )
            ->join('navbar', 'submenu.navbar_id', '=', 'navbar.id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('submenu.edit', $row->id);
                    // $btn = '<a onclick="openEditModal('.$row->id.')" class="edit btn btn-icon icon-left btn-warning btn-sm" style="padding: 10px 10px; font-size: 12px;">
                    //             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    //             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    //             </svg>
                    //         </a>
                    //         <a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;">
                    //            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    //             <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    //             <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    //             </svg>
                    //         </a>';
                    $btn = '<a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('navbar.submenu.index');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'submenu' => 'required|string|max:300',
            'slug'    => [
                'required',
                'regex:/^[a-z0-9-]+$/', 
                'unique:submenu,slug', 
                'max:255',
            ],
            'urutan'  => 'required|integer|min:1',
        ], [
            'submenu.required' => 'Submenu wajib diisi.',
            'slug.required'    => 'Slug wajib diisi.',
            'slug.regex'       => 'Slug hanya boleh huruf kecil, angka, dan tanda minus (-).',
            'slug.unique'      => 'Slug sudah digunakan, silakan pilih yang lain.',
            'urutan.required'  => 'Urutan wajib diisi.',
            'urutan.integer'   => 'Urutan harus berupa angka.',
            'urutan.min'       => 'Urutan minimal bernilai 1.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }


        Submenu::create([
            'navbar_id' => 8,
            'is_dynamic' => 1,
            'submenu' => $request->submenu,
            'slug' => $request->slug,
            'urutan' => $request->urutan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function destroy($id)
    {
        try {
             $submenu = Submenu::findOrFail($id);
             $submenu->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }

    public function edit($id)
    {
        $subMenu = Submenu::findOrFail($id);
        return response()->json([
            'subMenu' => $subMenu
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
            'submenu' => 'required|string|max:300',
            'slug'    => [
                'required',
                'regex:/^[a-z0-9-]+$/',
                'unique:submenu,slug,' . $id, 
                'max:255',
            ],
            'urutan'  => 'required|integer|min:1',
        ], [
            'submenu.required' => 'Submenu wajib diisi.',
            'slug.required'    => 'Slug wajib diisi.',
            'slug.regex'       => 'Slug hanya boleh huruf kecil, angka, dan tanda minus (-).',
            'slug.unique'      => 'Slug sudah digunakan, silakan pilih yang lain.',
            'urutan.required'  => 'Urutan wajib diisi.',
            'urutan.integer'   => 'Urutan harus berupa angka.',
            'urutan.min'       => 'Urutan minimal bernilai 1.',
        ]);

        $subMenu = SubMenu::findOrFail($id);


        $subMenu->update([
            'submenu' => $request->submenu,
            'slug' => $request->slug,
            'urutan' => $request->urutan,
        ]);

        return response()->json(['success' => true]);
    }

}
