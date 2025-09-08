<?php

namespace App\Http\Controllers;

use App\Models\Inovasi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class InovasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Inovasi::select(
                'inovasi.*'
            );            

           return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('file', function ($row) {
                if ($row->file) {
                    $url = asset('file_inovasi/' . $row->file);
                    $namaFile = basename($row->file);
                    return '<a href="'.$url.'" target="_blank">'.$namaFile.'</a>';
                } else {
                    return '<span class="text-muted">Belum ada file</span>';
                }
            })
            ->addColumn('action', function($row){
                $editUrl = route('inovasi.edit', $row->id);
                $btn = '<a href="'.$editUrl.'" class="edit btn btn-icon icon-left btn-warning btn-sm" style="padding: 10px 10px; font-size: 12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/> </svg>
                        </a>
                        <a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/> <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/> </svg>
                        </a>';
                return $btn;
            })
            ->rawColumns(['file', 'action']) // tambahkan 'file' di sini
            ->make(true);
        }
        return view('informasi.inovasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $inovasi = Inovasi::all();        
            return view('informasi.inovasi.create', compact('inovasi'));
            
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
                'judul' => 'required|string|max:255',
                'tahun' => 'required',
                'tahapan' => 'required',
                'file' => 'nullable|file|mimes:pdf|max:2048',
                'bentuk' => 'required',
            ]);

            if ($request->hasFile('file')) {
                $imageName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('file_inovasi'), $imageName);
            } else {
                $imageName = null;
            }

            $inovasi = new Inovasi;
           
            $inovasi->judul = $request->judul;
            $inovasi->tahun = $request->tahun;
            $inovasi->tahapan = $request->tahapan;            
            $inovasi->file = $imageName;
            $inovasi->bentuk = $request->bentuk; 
            $inovasi->save();

            \Session::flash('success', __('Inovasi Berhasil Ditambahkan'));
            return redirect()->route('inovasi.index');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            \Session::flash('error', $errorMessage);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inovasi  $inovasi
     * @return \Illuminate\Http\Response
     */
    public function show(Inovasi $inovasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inovasi  $inovasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $inovasi = Inovasi::find($id);
        return view('informasi.inovasi.edit', compact('inovasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inovasi  $inovasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inovasi = Inovasi::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'tahun'   => 'required',
            'tahapan' => 'required',
            'file'    => 'nullable|file|mimes:pdf|max:2048',
            'bentuk'  => 'required',
        ]);

        // Simpan nama file lama
        $oldFile = $inovasi->file;

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($oldFile && file_exists(public_path('file_inovasi/' . $oldFile))) {
                unlink(public_path('file_inovasi/' . $oldFile));
            }

            // Simpan file baru
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file_inovasi'), $filename);

            // Update field file di database
            $inovasi->file = $filename;
        }

        // Update field lain
        $inovasi->judul   = $request->judul;
        $inovasi->tahun   = $request->tahun;
        $inovasi->tahapan = $request->tahapan;
        $inovasi->bentuk  = $request->bentuk;

        $inovasi->save();

        return redirect()->route('inovasi.index')->with('success', 'Inovasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inovasi  $inovasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $inovasi = Inovasi::findOrFail($id);
             $inovasi->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
