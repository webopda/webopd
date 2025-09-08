<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Poli::select(
            //     'poli.*'
            //     // 'pegawai.nama as author_name'
            // );
            // // ->join('pegawai', 'berita.author', '=', 'pegawai.id');

            // return DataTables::of($data)
            //     ->addIndexColumn()
            //     ->addColumn('action', function($row){
            //         $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-icon icon-left btn-warning btn-sm" style="padding: 10px 10px; font-size: 12px;"><i class="fa fa-pencil"></i></a>
            //                 <a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;"><i class="fa fa-trash"></i></a>';
            //         return $btn;
            //     })
            //     ->rawColumns(['action'])
            //     ->make(true);
    $data = Poli::select('poli.*');

    return DataTables::of($data)
    ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('poli.edit', $row->id);
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
    ->editColumn('keterangan', function($row){
    return $row->keterangan;
    })
    ->rawColumns(['keterangan','action'])
    ->make(true);

        }
        return view('poli.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create()
    {
        try{
            $poli = Poli::all();
            // $author = Pegawai::select('nama','id')->get();
            return view('poli.create', compact('poli'));
            
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
        // Validasi input
        $request->validate([
            'nama_poli' => 'required|string|max:255|unique:poli,nama_poli',
            'keterangan' => 'nullable'
        ], [
            'nama_poli.required' => 'Nama Poli wajib diisi!',
            'nama_poli.unique' => 'Nama Poli sudah terdaftar, harap pilih nama lain.',
            // 'keterangan.required' => 'Keterangan harus diisi.',
        ]);

        // Menyimpan data ke dalam database
        $poli = new Poli;
        $poli->nama_poli = $request->nama_poli;
        $poli->keterangan = $request->keterangan;
        $poli->save();

        // Menyimpan pesan sukses
        \Session::flash('success', __('Data Poliklinik Berhasil Ditambahkan'));
        return redirect()->route('poli.index');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Menangani error validasi
        return redirect()->back()->withErrors($e->errors())->withInput();

    } catch (\Exception $e) {
        // Menangani error lainnya
        $errorMessage = $e->getMessage();
        \Session::flash('error', $errorMessage);
        return redirect()->back();
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poli = Poli::find($id);
        return view('poli.edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poli = Poli::findOrFail($id);

        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'required|string'
        ]);

        $poli->update([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('poli.index')->with('success', 'Berhasil diperbarui');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            try {
                $poli= Poli::findOrFail($id);
                $poli->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        }
}
