<?php

namespace App\Http\Controllers;

use App\Models\Ugd;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UgdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ugd::select(
                'ugd.*'
            );

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function($row){
                    if ($row->foto) {
                        $url = asset('img_ugd/'.$row->foto);
                        $extension = strtolower(pathinfo($row->foto, PATHINFO_EXTENSION));

                        $imageExtensions = ['jpg','jpeg','png','gif','svg'];

                        $videoExtensions = ['mp4','avi','mov','wmv'];

                        if (in_array($extension, $imageExtensions)) {
                         
                            return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" 
                                        style="max-width:180px;cursor:pointer" data-title="Foto UGD">';
                        } elseif (in_array($extension, $videoExtensions)) {
                            return '<video width="180" height="120" controls style="cursor:pointer">
                                        <source src="'.$url.'" type="video/'.$extension.'">
                                        Browser Anda tidak mendukung video.
                                    </video>';
                        } else {
                            return 'File tidak didukung';
                        }
                    } else {
                        return '-';
                    }
                })
                ->addColumn('detail_pelayanan', function($row){
                    return strip_tags($row->detail_pelayanan);
                })
                ->addColumn('action', function($row){
                    $editUrl = route('ugd.edit', $row->id);
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
                ->rawColumns(['action','foto','detail_pelayanan'])
                ->make(true);
        }
        return view('layanan.ugd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $ugd = Ugd::all();
            return view('layanan.ugd.create', compact('ugd'));
            
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
                'detail_pelayanan' => 'required|string|max:255',
                'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,wmv',
            ]);

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $mimeType = $file->getMimeType();

                if (str_starts_with($mimeType, 'image/')) {
                    if ($file->getSize() > 2 * 1024 * 1024) {
                        return back()->withErrors(['foto' => 'Ukuran foto maksimal 2MB']);
                    }
                } elseif (str_starts_with($mimeType, 'video/')) {
                    if ($file->getSize() > 10 * 1024 * 1024) {
                        return back()->withErrors(['foto' => 'Ukuran video maksimal 10MB']);
                    }
                }

                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img_ugd'), $fileName);
            } else {
                $fileName = null;
            }

            $ugd = new Ugd;
            $ugd->detail_pelayanan = $request->detail_pelayanan;
            $ugd->foto = $fileName;
            $ugd->save();

            \Session::flash('success', __('Data UGD Berhasil Ditambahkan'));
            return redirect()->route('ugd.index');
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
        $ugd = Ugd::find($id);
        return view('layanan.ugd.edit', compact('ugd'));
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
        $ugd = Ugd::findOrFail($id);

        $request->validate([
            'detail_pelayanan' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,wmv',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $mimeType = $file->getMimeType();

            if (str_starts_with($mimeType, 'image/')) {
                if ($file->getSize() > 2 * 1024 * 1024) {
                    return back()->withErrors(['foto' => 'Ukuran foto maksimal 2MB']);
                }
            } elseif (str_starts_with($mimeType, 'video/')) {
                if ($file->getSize() > 10 * 1024 * 1024) {
                    return back()->withErrors(['foto' => 'Ukuran video maksimal 10MB']);
                }
            }

            if ($ugd->foto && file_exists(public_path('img_ugd/'.$ugd->foto))) {
                unlink(public_path('img_ugd/'.$ugd->foto));
            }

            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img_ugd'), $fileName);
        } else {
            $fileName = $ugd->foto; 
        }

        // Update data
        $ugd->update([
            'detail_pelayanan' => $request->detail_pelayanan,
            'foto' => $fileName,
        ]);

        return redirect()->route('ugd.index')->with('success', 'Data UGD berhasil diperbarui');
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
             $ugd = Ugd::findOrFail($id);
             $ugd->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
