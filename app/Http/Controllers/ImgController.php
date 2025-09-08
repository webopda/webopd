<?php

namespace App\Http\Controllers;

use App\Models\Img;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Img::select(
                'img.*'
            );

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('indikator_mutu', function($row){
                    if ($row->indikator_mutu) {
                        $url = asset('indikator_mutu/'.$row->indikator_mutu);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="Indikator Mutu">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('standar_pelayanan', function($row){
                    if ($row->standar_pelayanan) {
                        $url = asset('standar_pelayanan/'.$row->standar_pelayanan);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="Standar Pelayanan">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('jadwal_dokter', function($row){
                    if ($row->jadwal_dokter) {
                        $url = asset('jadwal_dokter/'.$row->jadwal_dokter);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="Jadwal Dokter">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function($row){
                    $editUrl = route('img.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="edit btn btn-icon icon-left btn-warning btn-sm" style="padding: 10px 10px; font-size: 12px;">
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
                ->rawColumns(['action','indikator_mutu', 'standar_pelayanan', 'jadwal_dokter'])
                ->make(true);
        }
        return view('informasi.img.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $img = Img::all();
            return view('informasi.img.create', compact('img'));
            
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'indikator_mutu' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'standar_pelayanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'jadwal_dokter' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('indikator_mutu')) {
                $imageName = time() . '.' . $request->indikator_mutu->extension();
                $request->indikator_mutu->move(public_path('indikator_mutu'), $imageName);
            } else {
                $imageName = null;
            }

            if ($request->hasFile('standar_pelayanan')) {
                $imageName2 = time() . '.' . $request->standar_pelayanan->extension();
                $request->standar_pelayanan->move(public_path('standar_pelayanan'), $imageName2);
            } else {
                $imageName2 = null;
            }

            if ($request->hasFile('jadwal_dokter')) {
                $imageName3 = time() . '.' . $request->jadwal_dokter->extension();
                $request->jadwal_dokter->move(public_path('jadwal_dokter'), $imageName3);
            } else {
                $imageName3 = null;
            }

            $img = new Img;
            $img->indikator_mutu = $imageName;
            $img->standar_pelayanan = $imageName2;
            $img->jadwal_dokter = $imageName3;
            $img->save();

            \Session::flash('success', __('Data Image Berhasil Ditambahkan'));
            return redirect()->route('img.index');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            \Session::flash('error', $errorMessage);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img = Img::find($id);
        return view('informasi.img.edit', compact('img'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = Img::findOrFail($id);

        $request->validate([
            'indikator_mutu' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'standar_pelayanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jadwal_dokter' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('indikator_mutu')) {
            if ($img->indikator_mutu && file_exists(public_path('indikator_mutu/'.$img->indikator_mutu))) {
                unlink(public_path('indikator_mutu/'.$img->indikator_mutu));
            }

            $imageName = time().'.'.$request->indikator_mutu->extension();
            $request->indikator_mutu->move(public_path('indikator_mutu'), $imageName);
        } else {
            $imageName = $img->indikator_mutu; 
        }

        if ($request->hasFile('standar_pelayanan')) {
            if ($img->standar_pelayanan && file_exists(public_path('standar_pelayanan/'.$img->standar_pelayanan))) {
                unlink(public_path('standar_pelayanan/'.$img->standar_pelayanan));
            }

            $imageName2 = time().'.'.$request->standar_pelayanan->extension();
            $request->standar_pelayanan->move(public_path('standar_pelayanan'), $imageName2);
        } else {
            $imageName2 = $img->standar_pelayanan; 
        }

        if ($request->hasFile('jadwal_dokter')) {
            if ($img->jadwal_dokter && file_exists(public_path('jadwal_dokter/'.$img->jadwal_dokter))) {
                unlink(public_path('jadwal_dokter/'.$img->jadwal_dokter));
            }

            $imageName3 = time().'.'.$request->jadwal_dokter->extension();
            $request->jadwal_dokter->move(public_path('jadwal_dokter'), $imageName3);
        } else {
            $imageName3 = $img->jadwal_dokter; 
        }

        $img->update([
            'indikator_mutu' => $imageName,
            'standar_pelayanan' => $imageName2,
            'jadwal_dokter' => $imageName3,
        ]);

        return redirect()->route('img.index')->with('success', 'Data Img berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $img = Img::findOrFail($id);
             $img->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
