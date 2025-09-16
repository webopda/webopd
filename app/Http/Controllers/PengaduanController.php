<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengaduan::select(
                'pengaduan.*'
            );            

           return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function($row){
                $btn = '
                    <a onclick="balasPengaduan('.$row->id.')" class="btn btn-icon icon-left btn-primary btn-sm" style="padding: 10px 10px; font-size: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                            <path d="M6.598 5.013a.144.144 0 0 1 .202.134v2.482h4.5c.07 0 .127.057.127.127v1.332a.127.127 0 0 1-.127.127h-4.5v2.482a.144.144 0 0 1-.202.134L2.39 8.707a.144.144 0 0 1 0-.254l4.208-3.44z"/>
                        </svg>
                    </a>
                    <a onclick="confirmDelete('.$row->id.')" class="btn btn-icon icon-left btn-danger btn-sm" style="padding: 10px 10px; font-size: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 0-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('pengaduan.index');
    }

    public function destroy($id)
    {
        try {
             $pengaduan = Pengaduan::findOrFail($id);
             $pengaduan->delete();
             return response()->json(['success' => true]);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()]);
         }
    }

    public function balas(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->balasan = $request->balasan; 
        $pengaduan->save();

        return response()->json([
            'success' => true,
            'balasan' => $pengaduan->balasan
        ]);
    }

    public function getBalasan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return response()->json(['balasan' => $pengaduan->balasan]);
    }
}
