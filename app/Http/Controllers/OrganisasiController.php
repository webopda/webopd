<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
  use Illuminate\Support\Str;
class OrganisasiController extends Controller
{
    //

    public function index()
    {
        //
$data_organisasi = organisasi::get();
        return view('organisasi.index',compact('data_organisasi'));
    }

    public function tambah()
    {
        return view('organisasi.tambah');
    }


    public function create(Request $request)
    {
        $request->validate([
           
            'gambar'=>'required|mimes:jpg,jpeg,png',
            'organisasi'=>'required',
            
        ]);
 $cek_organisasi= organisasi::count();
 if($cek_organisasi>=1)
 {
    
    Alert::info('Data Sudah Ada','Silahkan Lakukan Pengeditan');
                return redirect('admin/organisasi');

 }

        try{
            $tambah_organisasi= new organisasi;
            $tambah_organisasi->deskripsi= $request->organisasi;
         
if($request->hasFile('gambar')){
    $file=$request->file('gambar');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'organisasi/gambar',$namafile);
    $nama_gambar= $namafile;
    $tambah_organisasi->gambar=$nama_gambar;
}

           
            $tambah_organisasi->save();
            Alert::success('Berhasil','Data Berhasil Disimpan');
            return redirect('admin/organisasi');


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
        $edit_organisasi= organisasi::find($id);
        return view('organisasi.edit',compact('edit_organisasi'));
    }
    
    public function update(Request $request,$id)
    {
         $request->validate([
            'organisasi'=>'required',
           
            'gambar'=>'nullable|mimes:jpg,jpeg,png',
           
        ]);

        try{
                $edit_organisasi= organisasi::find($id);

if($request->hasFile('gambar')){
 if($edit_organisasi->gambar !=='' && file_exists(public_path().'/organisasi/gambar/',$edit_organisasi->gambar))
 {
                    $gambar_path = public_path().'/organisasi/gambar/'.$edit_organisasi->gambar;

    unlink($gambar_path);
 }
    $file=$request->file('gambar');
    $namafile= Str::random(10,20).$file->getClientOriginalName();
    $file->move(public_path().'/'.'organisasi/gambar',$namafile);
    $nama_gambar= $namafile;
    $edit_organisasi->gambar=$nama_gambar;
}
  $edit_organisasi->deskripsi= $request->organisasi;
          
            $edit_organisasi->update();
            Alert::success('Berhasil','Data Berhasil Diupdate');
            return redirect('admin/organisasi');
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
            $hapus_organisasi= organisasi::find($id);
             $gambar_path = public_path().'/organisasi/gambar/'.$hapus_organisasi->gambar;
                
                unlink($gambar_path);
            $hapus_organisasi->delete();
             Alert::success('Berhasil','Data Berhasil Dihapus');
            return redirect()->back();
         }catch(\Exception $e)
        {
            Alert::info('Gagal','Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
