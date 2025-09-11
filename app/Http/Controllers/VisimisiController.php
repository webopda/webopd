<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Misi;
use App\Models\Visi;
use App\Models\Moto;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Str;
class VisimisiController extends Controller
{
    //
 public function index()
 {
    $tampil_misi= Misi::get();
    return view('misi.index',compact('tampil_misi'));
 }
 public function indexvisi()
 {
    $tampil_visi= visi::get();
    return view('visi.index',compact('tampil_visi'));
 }
 public function indexmoto()
 {
    $tampil_moto= moto::get();
    return view('moto.index',compact('tampil_moto'));
 }

    public function create(Request $request)
    {
        $request->validate([
            'misi'=>'required|unique:misis'
        ]);
        try{

            $misi_buat= new Misi;
            $misi_buat->misi= $request->misi;
            $misi_buat->save();
Alert::success('Sukses', 'Data misi Berhasil Disimpan');
 return redirect('admin/misi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data misi Gagal Disimpan'.$e);
 return redirect()->back();
    }
        }
    public function update($id,Request $request)
    {
        $request->validate([
            'misi'=>'required|unique:misis'
        ]);
        try{

            $misi_buat=  Misi::find($id);
            $misi_buat->misi= $request->misi;
            $misi_buat->update();
Alert::success('Sukses', 'Data misi Berhasil Diupdate');
 return redirect('admin/misi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data misi Gagal Diupdate'.$e);
 return redirect()->back();
    }
        }

        public function hapus($id)
        {
            try{
                $misi_hapus= Misi::find($id);
                $misi_hapus->delete();
            Alert::success('Sukses', 'Data misi Berhasil Dihapus');
 return redirect('admin/misi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data misi Gagal Dihapus'.$e);
 return redirect()->back();
    }
        }

        //visi

         public function createvisi(Request $request)
    {
        $request->validate([
            'visi'=>'required|unique:visis'
        ]);
        try{

            $visi_buat= new visi;
            $visi_buat->visi= $request->visi;
            $visi_buat->save();
Alert::success('Sukses', 'Data visi Berhasil Disimpan');
 return redirect('admin/visi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data visi Gagal Disimpan'.$e);
 return redirect()->back();
    }
        }
    public function updatevisi($id,Request $request)
    {
        $request->validate([
            'visi'=>'required|unique:visis'
        ]);
        try{

            $visi_buat=  visi::find($id);
            $visi_buat->visi= $request->visi;
            $visi_buat->update();
Alert::success('Sukses', 'Data visi Berhasil Diupdate');
 return redirect('admin/visi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data visi Gagal Diupdate'.$e);
 return redirect()->back();
    }
        }

        public function hapusvisi($id)
        {
            try{
                $visi_hapus= visi::find($id);
                $visi_hapus->delete();
            Alert::success('Sukses', 'Data visi Berhasil Dihapus');
 return redirect('admin/visi');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data visi Gagal Dihapus'.$e);
 return redirect()->back();
    }
        }
    

//moto

 public function createmoto(Request $request)
    {
        $request->validate([
            'moto'=>'required|unique:motos'
        ]);
        try{

            $moto_buat= new moto;
            $moto_buat->moto= $request->moto;
            $moto_buat->save();
Alert::success('Sukses', 'Data moto Berhasil Disimpan');
 return redirect('admin/moto');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data moto Gagal Disimpan'.$e);
 return redirect()->back();
    }
        }
    public function updatemoto($id,Request $request)
    {
        $request->validate([
            'moto'=>'required|unique:motos'
        ]);
        try{

            $moto_buat=  moto::find($id);
            $moto_buat->moto= $request->moto;
            $moto_buat->update();
Alert::success('Sukses', 'Data moto Berhasil Diupdate');
 return redirect('admin/moto');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data moto Gagal Diupdate'.$e);
 return redirect()->back();
    }
        }

        public function hapusmoto($id)
        {
            try{
                $moto_hapus= moto::find($id);
                $moto_hapus->delete();
            Alert::success('Sukses', 'Data moto Berhasil Dihapus');
 return redirect('admin/moto');
    }catch(\Exception $e)
    {
 Alert::info('Gagal', 'Data moto Gagal Dihapus'.$e);
 return redirect()->back();
    }
        }}