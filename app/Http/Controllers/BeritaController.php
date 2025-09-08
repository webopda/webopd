<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Berita::select(
                'berita.*',
                'pegawai.nama as author_name'
            )
            ->join('pegawai', 'berita.author', '=', 'pegawai.id');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row){
                    if ($row->img) {
                        $url = asset('img_berita/'.$row->img);
                        $judul = e($row->judul);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$judul.'">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('keterangan', function($row){
                    return strip_tags($row->keterangan);
                })
                ->addColumn('action', function($row){
                    $editUrl = route('berita.edit', $row->id);
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
        return view('informasi.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $berita = Berita::all();
            $author = Pegawai::select('nama','id')->get();
            return view('informasi.berita.create', compact('berita','author'));
            
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
                'keterangan' => 'required',
                'tgl_publish' => 'required|date',
                'author' => 'required|exists:pegawai,id',
                'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('img_berita'), $imageName);
            } else {
                $imageName = null;
            }

            $berita = new Berita;
            $berita->author = $request->author;
            $berita->judul = $request->judul;
            $berita->keterangan = $request->keterangan;
            $berita->tgl_publish = $request->tgl_publish;
            $berita->img = $imageName;
            $berita->save();

            \Session::flash('success', __('Data Berita Berhasil Ditambahkan'));
            return redirect()->route('berita.index');
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
        $berita = Berita::find($id);
        $author = Pegawai::select('nama','id')->get();
        return view('informasi.berita.edit', compact('berita','author'));
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
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tgl_publish' => 'required|date',
            'author' => 'required',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('img')) {
            if ($berita->img && file_exists(public_path('img_berita/'.$berita->img))) {
                unlink(public_path('img_berita/'.$berita->img));
            }

            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('img_berita'), $imageName);
        } else {
            $imageName = $berita->img; 
        }

        $berita->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tgl_publish' => $request->tgl_publish,
            'author' => $request->author,
            'img' => $imageName,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
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
             $berita = Berita::findOrFail($id);
             $berita->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
