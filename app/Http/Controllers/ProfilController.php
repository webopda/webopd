<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
  use Illuminate\Support\Str;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
$data_profil = Profil::get();
        return view('profil.index',compact('data_profil'));
    }

    public function tambah()
    {
        return view('profil.tambah');
    }


    public function create(Request $request)
    {
        $request->validate([
           
            'struktur_org'=>'required|mimes:jpg,jpeg,png',
            'misi'=>'required',
            'visi'=>'required',
            
        ]);
 $cek_profil= profil::count();
 if($cek_profil>=1)
 {
    
    Alert::info('Data Sudah Ada','Silahkan Lakukan Pengeditan');
                return redirect('admin/profil');

 }

        try{
            $tambah_profil= new Profil;
            $tambah_profil->sejarah= $request->sejarah;
            $tambah_profil->visi= $request->visi;
            $tambah_profil->misi= $request->misi;

if($request->hasFile('struktur_org')){
    $file=$request->file('struktur_org');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'profil/gambar',$namafile);
    $nama_gambar= $namafile;
    $tambah_profil->struktur_org=$nama_gambar;
}

            $tambah_profil->moto= $request->moto;
            $tambah_profil->urutan= $request->urutan;
            $tambah_profil->save();
            Alert::success('Berhasil','Data Berhasil Disimpan');
            return redirect('admin/profil');


        }catch(\Exception $e)
        {
            Alert::info('Gagal','Data Gagal Disimpan');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit_profil= Profil::find($id);
        return view('profil.edit',compact('edit_profil'));
    }
    
    public function update(Request $request,$id)
    {
         $request->validate([
            'sejarah'=>'required',
            'visi'=>'required',
            'misi'=>'required',
            'struktur_org'=>'nullable|mimes:jpg,jpeg,png',
            'moto'=>'required',
            'urutan'=>'required|unique:profil,urutan,'.$id,
        ]);

        try{
                $edit_profil= Profil::find($id);

if($request->hasFile('struktur_org')){
 if($edit_profil->struktur_org !=='' && file_exists(public_path().'/profil/gambar/',$edit_profil->struktur_org))
 {
                    $gambar_path = public_path().'/profil/gambar/'.$edit_profil->struktur_org;

    unlink($gambar_path);
 }
    $file=$request->file('struktur_org');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'profil/gambar',$namafile);
    $nama_gambar= $namafile;
    $edit_profil->struktur_org=$nama_gambar;
}
  $edit_profil->sejarah= $request->sejarah;
            $edit_profil->visi= $request->visi;
            $edit_profil->misi= $request->misi;
            $edit_profil->moto= $request->moto;
            $edit_profil->urutan= $request->urutan;
            $edit_profil->update();
            Alert::success('Berhasil','Data Berhasil Diupdate');
            return redirect('admin/profil');
            Alert::success('Berhasil','Data Berhasil Diupdate');


        }catch(\Exception $e)
        {
            Alert::info('Gagal','Data Gagal Diupdate');
            return redirect()->back();
        }


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        try{
            $hapus_profil= Profil::find($id);
             $gambar_path = public_path().'/profil/gambar/'.$hapus_profil->struktur_org;
                
                unlink($gambar_path);
            $hapus_profil->delete();
             Alert::success('Berhasil','Data Berhasil Dihapus');
            return redirect()->back();
         }catch(\Exception $e)
        {
            Alert::info('Gagal','Data Gagal Dihapus');
            return redirect()->back();
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
