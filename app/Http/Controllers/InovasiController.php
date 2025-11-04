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
            ->addColumn('sop', function ($row) {
                if ($row->sop) {
                    $url = asset('file_sop_inovasi/' . $row->sop);
                    $namaFile = basename($row->sop);
                    return '<a href="'.$url.'" target="_blank">'.$namaFile.'</a>';
                } else {
                    return '<span class="text-muted">Belum ada file</span>';
                }
                
            })
            ->addColumn('manual_book', function ($row) {
                if ($row->manual_book) {
                    $url = asset('file_manual_book/' . $row->manual_book);
                    $namaFile = basename($row->manual_book);
                    return '<a href="'.$url.'" target="_blank">'.$namaFile.'</a>';
                } else {
                    return '<span class="text-muted">Belum ada file</span>';
                }
                
            })
            ->addColumn('proposal', function ($row) {
                if ($row->proposal) {
                    $url = asset('file_proposal_inovasi/' . $row->proposal);
                    $namaFile = basename($row->proposal);
                    return '<a href="'.$url.'" target="_blank">'.$namaFile.'</a>';
                } else {
                    return '<span class="text-muted">Belum ada file</span>';
                }
                
            })
            ->addColumn('img1', function($row){
                    if ($row->img1) {
                        $url = asset('img1_inovasi/'.$row->img1);
                        $judul = e($row->judul);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$judul.'">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('img2', function($row){
                    if ($row->img2) {
                        $url = asset('img2_inovasi/'.$row->img2);
                        $judul = e($row->judul);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$judul.'">';
                    } else {
                        return '-';
                    }
                })

            ->addColumn('deskripsi', function($row){
                $text = strip_tags($row->deskripsi);
                return strlen($text) > 255 ? substr($text, 0, 255) . '...' : $text;
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
            ->rawColumns(['proposal','sop','manual_book','img1','img2','action', 'deskripsi']) // tambahkan 'file' di sini
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
                'deskripsi' => 'required',
                'sop' => 'nullable|file|mimes:pdf|max:2048',
                'manual_book' => 'nullable|file|mimes:pdf|max:2048',
                'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tgl_publish' => 'required|date',
                'proposal' => 'nullable|file|mimes:pdf|max:2048',
                
            ]);

            if ($request->hasFile('sop')) {
                $imageName = time() . '.' . $request->sop->extension();
                $request->sop->move(public_path('file_sop_inovasi'), $imageName);
            } else {
                $imageName = null;
            }
            if ($request->hasFile('manual_book')) {
                $imageName1 = time() . '.' . $request->manual_book->extension();
                $request->manual_book->move(public_path('file_manual_book'), $imageName1);
            } else {
                $imageName1 = null;
            }
            if ($request->hasFile('img1')) {
                $imageName2 = time() . '.' . $request->img1->extension();
                $request->img1->move(public_path('img1_inovasi'), $imageName2);
            } else {
                $imageName2 = null;
            }
            if ($request->hasFile('img2')) {
                $imageName3 = time() . '.' . $request->img2->extension();
                $request->img2->move(public_path('img2_inovasi'), $imageName3);
            } else {
                $imageName3 = null;
            }
            if ($request->hasFile('proposal')) {
                $imageName4 = time() . '.' . $request->proposal->extension();
                $request->proposal->move(public_path('file_proposal_inovasi'), $imageName4);
            } else {
                $imageName4 = null;
            }

            $inovasi = new Inovasi;
           
            $inovasi->judul = $request->judul;
            $inovasi->tahun = $request->tahun;
            $inovasi->deskripsi = $request->deskripsi;            
            $inovasi->sop = $imageName;
            $inovasi->manual_book = $imageName1;
            $inovasi->img1 = $imageName2;
            $inovasi->img2 = $imageName3;
            $inovasi->tgl_publish = $request->tgl_publish; 
            $inovasi->proposal = $imageName4;
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
            'judul' => 'required|string|max:255',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'sop' => 'nullable|file|mimes:pdf|max:2048',
            'manual_book' => 'nullable|file|mimes:pdf|max:2048',
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tgl_publish' => 'required|date',
            'proposal' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Simpan nama file lama
        $oldFile = $inovasi->sop;
        $oldFile1 = $inovasi->manual_book;
        $oldFile2 = $inovasi->img1;
        $oldFile3 = $inovasi->img2;
        $oldFile4 = $inovasi->proposal;

        // Jika ada file baru diupload
        if ($request->hasFile('sop')) {
            // Hapus file lama jika ada
            if ($oldFile && file_exists(public_path('file_sop_inovasi/' . $oldFile))) {
                unlink(public_path('file_sop_inovasi/' . $oldFile));
            }

            // Simpan file baru
            $sop = $request->file('sop');
            $filename = time() . '_' . $sop->getClientOriginalName();
            $sop->move(public_path('file_sop_inovasi'), $filename);

            // Update field file di database
            $inovasi->sop = $filename;
        }
        if ($request->hasFile('manual_book')) {
            // Hapus file lama jika ada
            if ($oldFile1 && file_exists(public_path('file_manual_book/' . $oldFile1))) {
                unlink(public_path('file_manual_book/' . $oldFile1));
            }

            // Simpan file baru
            $manual_book = $request->file('manual_book');
            $filename1 = time() . '_' . $manual_book->getClientOriginalName();
            $manual_book->move(public_path('file_manual_book'), $filename1);

            // Update field file di database
            $inovasi->manual_book = $filename1;
        }
        if ($request->hasFile('img1')) {
            // Hapus file lama jika ada
            if ($inovasi->img1 && file_exists(public_path('img1_inovasi/' . $inovasi->img1))) {
                unlink(public_path('img1_inovasi/' . $inovasi->img1));
            }

            // Generate a unique filename using uniqid
            $imageName2 = uniqid() . '.' . $request->img1->extension();
            $request->img1->move(public_path('img1_inovasi'), $imageName2);

            // Update img1 in database
            $inovasi->img1 = $imageName2;
        } else {
            $imageName2 = $inovasi->img1; 
        }
        if ($request->hasFile('img2')) {
            // Hapus file lama jika ada
            if ($inovasi->img2 && file_exists(public_path('img2_inovasi/' . $inovasi->img2))) {
                unlink(public_path('img2_inovasi/' . $inovasi->img2));
            }

            // Generate a unique filename using uniqid
            $imageName3 = uniqid() . '.' . $request->img2->extension();

            // Move img2 file
            $request->img2->move(public_path('img2_inovasi'), $imageName3);

            // Update img2 in database
            $inovasi->img2 = $imageName3;
        } else {
            $imageName3 = $inovasi->img2;
        }
        if ($request->hasFile('proposal')) {
            // Hapus file lama jika ada
            if ($oldFile4 && file_exists(public_path('file_proposal_inovasi/' . $oldFile4))) {
                unlink(public_path('file_proposal_inovasi/' . $oldFile4));
            }

            // Simpan file baru
            $proposal = $request->file('proposal');
            $filename4 = time() . '_' . $proposal->getClientOriginalName();
            $proposal->move(public_path('file_proposal_inovasi'), $filename4);

            // Update field file di database
            $inovasi->proposal = $filename4;
        }

        // Update field lain
        $inovasi->judul = $request->judul;
        $inovasi->tahun = $request->tahun;
        $inovasi->deskripsi = $request->deskripsi;
        $inovasi->tgl_publish = $request->tgl_publish;

        // Save to database
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
