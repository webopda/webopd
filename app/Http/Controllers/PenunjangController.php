<?php

namespace App\Http\Controllers;

use App\Models\Penunjang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      {
        if ($request->ajax()) {
            $data = Penunjang::select(
                'penunjang.*',               
            );
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row){
                    if ($row->img) {
                        $url = asset('img_penunjang/'.$row->img);
                        $penunjang = e($row->penunjang);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$penunjang.'">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('keterangan', function($row){
                    return strip_tags($row->keterangan);
                })
                ->addColumn('action', function($row){
                    $editUrl = route('penunjang.edit', $row->id);
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
                ->rawColumns(['action','img', 'keterangan'])
                ->make(true);
        }
        return view('informasi.penunjang.index');
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $penunjang = Penunjang::all();        
            return view('informasi.penunjang.create', compact('penunjang'));
            
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
                'penunjang' => 'required|string|max:255',
                'keterangan' => 'required',
                'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('img_penunjang'), $imageName);
            } else {
                $imageName = null;
            }

            $penunj = new Penunjang;
           
            $penunj->penunjang = $request->penunjang;
            $penunj->keterangan = $request->keterangan;      
            $penunj->img = $imageName;
            $penunj->save();

            \Session::flash('success', __('Penunjang Berhasil Ditambahkan'));
            return redirect()->route('penunjang.index');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            \Session::flash('error', $errorMessage);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penunjang  $penunjang
     * @return \Illuminate\Http\Response
     */
    public function show(Penunjang $penunjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penunjang  $penunjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penunjang = Penunjang::find($id);        
        return view('informasi.penunjang.edit', compact('penunjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penunjang  $penunjang
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $penunjang = Penunjang::findOrFail($id);

    //     $request->validate([
    //         'penunjang' => 'required|string|max:255',
    //         'keterangan' => 'required',
    //         'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',     
    //     ]);

    //     if ($request->hasFile('img')) {
    //         if ($penunjang->img && file_exists(public_path('img_penunjang/'.$penunjang->img))) {
    //             unlink(public_path('img_penunjang/'.$penunjang->img));
    //         }

    //         $imageName = time().'.'.$request->img->extension();
    //         $request->img->move(public_path('img_penunjang'), $imageName);
    //     } else {
    //         $imageName = $penunjang->img; 
    //     }

    //         $penunjang->update([
    //         'penunjang' => $request->penunjang,
    //         'keterangan' => $request->keterangan,
    //         'img' => $imageName,            
    //     ]);

    //     return redirect()->route('penunjang.index')->with('success', 'Penunjang berhasil diperbarui');

    // }

    public function update(Request $request, $id)
    {
        $penunjang = Penunjang::findOrFail($id);

        $request->validate([
            'penunjang' => 'required|string|max:255',
            'keterangan' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',     
        ]);

        // kalau ada file baru
        if ($request->hasFile('img')) {
            // hapus file lama kalau ada
            $oldPath = public_path('img_penunjang/'.$penunjang->img);
            if ($penunjang->img && file_exists($oldPath) && is_file($oldPath)) {
                unlink($oldPath);
            }

            // simpan file baru
            $file = $request->file('img');
            $namafile = Str::random(20).'_'.$file->getClientOriginalName();
            $file->move(public_path('img_penunjang'), $namafile);

            $penunjang->img = $namafile;
        }

        // update field lain
        $penunjang->penunjang    = $request->penunjang;
        $penunjang->keterangan = $request->keterangan;

        $penunjang->save(); 
        return redirect()
            ->route('penunjang.index')
            ->with('success', 'Penunjang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penunjang  $penunjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $penunjang = Penunjang::findOrFail($id);
             $penunjang->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
