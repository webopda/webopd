<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\BalasanPengaduanMail;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
       $pengaduan=Pengaduan::orderBy('tanggal','desc')->get();
        return view('pengaduan.index',compact('pengaduan'));
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
        'balasan_email' => 'required|string',
        'email' => 'required|email'
    ]);

    $pengaduan = Pengaduan::findOrFail($id);
    $pengaduan->balasan = $request->balasan_email;
    $pengaduan->save();

    // kirim email
    Mail::to($request->email)->send(new BalasanPengaduanMail($pengaduan));

Alert::success('Berhasil','Pesan Berhasil Terkirim');
return redirect()->back();
}

    public function getBalasan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return response()->json(['balasan' => $pengaduan->balasan]);
    }
}
