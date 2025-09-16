<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\DetailInap;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
           $data = DB::table('rawat_inap')
            ->leftJoin('detail_inap', 'detail_inap.inap_id', '=', 'rawat_inap.id')
            ->select(
                'rawat_inap.id',
                'rawat_inap.nama',
                'rawat_inap.keterangan',
                'rawat_inap.icon',
                DB::raw("GROUP_CONCAT(detail_inap.img) as images")
            )
            ->groupBy('rawat_inap.id', 'rawat_inap.nama', 'rawat_inap.keterangan', 'rawat_inap.icon')
            ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('icon', function($row){
                    if ($row->icon) {
                        $url = asset('icon_inap/'.$row->icon);
                        $judul = e($row->nama);
                        return '<img src="'.$url.'" alt="Gambar" class="img-thumbnail preview-img" style="max-width:180px;cursor:pointer" data-title="'.$judul.'">';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('keterangan', function($row){
                    return strip_tags($row->keterangan);
                })
                ->addColumn('action', function($row){
                    $editUrl = route('rawatinap.edit', $row->id);
                    $images = \App\Models\DetailInap::where('inap_id', $row->id)
                        ->get()
                        ->map(function($img) {
                            return [
                                'id'  => $img->id,
                                'url' => asset('detail_inap/'.$img->img)
                            ];
                        });

                    // encode ke JSON untuk dikirim ke JS
                    $imgData = e($images->toJson());
                    //  $images = DetailInap::where('inap_id', $row->id)->pluck('img')->map(function($img) {
                    //     return asset('detail_inap/'.$img);
                    // });
                    // $imgUrls = $images->isNotEmpty() ? implode(',', $images->toArray()) : '';
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
                            </a>
                            <a onclick="openDetailModal('.$row->id.', '.$imgData.')"  
                                class="btn btn-icon icon-left btn-info btn-sm" 
                                style="padding: 10px 10px; font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                    <path d="M13.002 1H2.998A1 1 0 0 0 2 2v12a1 1 0 0 0 .998 1h10.004A1 1 0 0 0 14 14V2a1 1 0 0 0-.998-1zM3 13V3h10v10H3z"/>
                                    <path d="M10.648 8.646a.5.5 0 0 0-.707 0L8 10.586 6.354 8.94a.5.5 0 0 0-.708.707l2 2a.5.5 0 0 0 .708 0l2.294-2.293a.5.5 0 0 0 0-.708z"/>
                                </svg>
                            </a>';
                    return $btn;
                })
                ->rawColumns(['action', 'icon', 'keterangan'])
                ->make(true);
        }
        return view('layanan.rawatinap.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dokters = Dokter::with('poli')->get(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ]);
        }

        if ($request->hasFile('icon')) {
                $file1 = $request->file('icon');
                $fileName1 = time().'_icon.'.$file1->getClientOriginalExtension();
                $file1->move(public_path('icon_inap'), $fileName1);
            } else {
                $fileName1 = null;
            }

        RawatInap::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'icon' => $fileName1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawatJalan  $rawatJalan
     * @return \Illuminate\Http\Response
     */
    public function show(RawatJalan $rawatJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawatJalan  $rawatJalan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawatInap = RawatInap::findOrFail($id);
        return response()->json([
            'rawatInap' => $rawatInap
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
            'nama' => 'required',
            'keterangan' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $rawatInap = RawatInap::findOrFail($id);

        if ($request->hasFile('icon')) {
            if ($rawatInap->icon && file_exists(public_path('icon_inap/'.$rawatInap->icon))) {
                unlink(public_path('icon_inap/'.$rawatInap->icon));
            }

            $file1 = $request->file('icon');
            $fileName1 = time().'_icon.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('icon_inap'), $fileName1);
        } else {
            $fileName1 = $rawatInap->icon;
        }

        $rawatInap->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'icon' => $fileName1,
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawatJalan  $rawatJalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $rawatinap = RawatInap::findOrFail($id);
             $rawatinap->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }
}
