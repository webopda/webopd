<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
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
$data_profil = Sejarah::get();
        return view('profil.index',compact('data_profil'));
    }

    public function tambah()
    {
        return view('profil.tambah');
    }


    public function create(Request $request)
    {
        $request->validate([
           
            'gambar'=>'required|mimes:jpg,jpeg,png',
            'sejarah'=>'required',
            
        ]);
 $cek_profil= Sejarah::count();
 if($cek_profil>=1)
 {
    
    Alert::info('Data Sudah Ada','Silahkan Lakukan Pengeditan');
                return redirect('admin/profil');

 }

        try{
            $tambah_profil= new sejarah;
            $tambah_profil->sejarah= $request->sejarah;
         
if($request->hasFile('gambar')){
    $file=$request->file('gambar');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'profil/gambar',$namafile);
    $nama_gambar= $namafile;
    $tambah_profil->gambar=$nama_gambar;
}

           
            $tambah_profil->save();
            Alert::success('Berhasil','Data Berhasil Disimpan');
            return redirect('admin/profil');


        }catch(\Exception $e)
        {
            Alert::info('Gagal','Data Gagal Disimpan'.$e);
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
        $edit_profil= Sejarah::find($id);
        return view('profil.edit',compact('edit_profil'));
    }
    
    public function update(Request $request,$id)
    {
         $request->validate([
            'sejarah'=>'required',
           
            'gambar'=>'nullable|mimes:jpg,jpeg,png',
           
        ]);

        try{
                $edit_profil= Sejarah::find($id);

if($request->hasFile('gambar')){
 if($edit_profil->gambar !=='' && file_exists(public_path().'/profil/gambar/',$edit_profil->gambar))
 {
                    $gambar_path = public_path().'/profil/gambar/'.$edit_profil->gambar;

    unlink($gambar_path);
 }
    $file=$request->file('gambar');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'profil/gambar',$namafile);
    $nama_gambar= $namafile;
    $edit_profil->gambar=$nama_gambar;
}
  $edit_profil->sejarah= $request->sejarah;
          
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
            $hapus_profil= Sejarah::find($id);
             $gambar_path = public_path().'/profil/gambar/'.$hapus_profil->gambar;
                
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
