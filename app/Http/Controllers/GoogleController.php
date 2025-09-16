<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginGoogle;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengaduanMail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pengaduan;
class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
public function callback()
{
    $googleUser = Socialite::driver('google')->user();

    $login = LoginGoogle::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'nama' => $googleUser->getName(),
            'tanggal_login' => now(),
        ]
    );

    Session::put('login_google', [
        'id' => $login->id,
        'nama' => $login->nama,
        'email' => $login->email,
        'tanggal_login' => $login->tanggal_login,
    ]);

    return redirect('landing/pengaduan');
}

public function logout()
    {
        Session::forget('login_google');
        return redirect('/')->with('success', 'Berhasil logout.');
    }

    public function pengaduanmail(Request $request)
    {

       try{
         $cek_pengaduan=Pengaduan::where('email',$request->email)->where('tanggal',date('Y-m-d'))->count();

         $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'tanggal_kunjungan' => 'required|date',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        if($cek_pengaduan >=1)
        {

            Alert::info('Info','Anda Sudah Melakukan Pengaduan Hari ini Silahkan Tunggu Balasan Email');
            return redirect()->back();
        }
        $pengaduan = new Pengaduan();
        $pengaduan->nama = $request->nama;
        $pengaduan->nik = $request->nik;
        $pengaduan->tanggal_kunjungan = $request->tanggal_kunjungan;
        $pengaduan->email = $request->email;
        $pengaduan->pesan = $request->pesan;
        $pengaduan->tanggal = date('Y-m-d');
        $pengaduan->save();

        Mail::to($pengaduan->email)->send(new PengaduanMail($pengaduan));

        // (Opsional) kirim juga notifikasi ke admin
        // Mail::to('admin@domain.com')->send(new PengaduanMail($pengaduan));

        // Redirect dengan pesan sukses
       // return redirect()->back()->with('success', 'Terima kasih telah melakukan pengaduan. Pesan anda akan segera kami balas.');
    Alert::success('Terkirim','Terima kasih telah melakukan pengaduan. Pesan anda akan segera kami balas.');
    return redirect()->back();
       }catch(\Exception $e)
       {
 Alert::info('Gagal','Pengaduan Gagal Terkirim'.$e);
            return redirect()->back();
       }
    }

    }
