<?php

namespace App\Http\Controllers;

use App\Models\FotoDashboard;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
  use Illuminate\Support\Str;

class FotoDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tampil_slider= FotoDashboard::get();
        return view('landing.fotodashboard.index',compact('tampil_slider'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'judul'=>'required',
            'foto'=>'required|mimes:jpg,png,jpeg',
            'urutan'=>'required'
        ]);
       try{

        //tambah gambar
         $tambah_slider=new FotoDashboard;
        if($request->hasFile('foto')){
            
            $file=$request->file('foto');
            $nameFile=Str::random(20,30).$file->getClientOriginalName();
            $file->move(public_path(). '/slider/gambar', $nameFile);
            $gambar_slider=$nameFile;
            $tambah_slider->foto=$gambar_slider;
        }
          $tambah_slider->judul=$request->judul;
        $tambah_slider->urutan=$request->urutan;
        $tambah_slider->save();
                Alert::success('Sukses', 'Berhasil Tambah Slider');
                return redirect()->back();

       }catch(\Exception $e)
       {
        //error jika data ada masalah
        Alert::info('Gagal', 'Gagal Simpan Data'.$e);
                return redirect()->back();

       }
    }
public function update(Request $request,$id)
{
      $request->validate([
            'judul'=>'required',
            'foto'=>'mimes:jpg,png,jpeg',
            'urutan'=>'required'
        ]);

        try{
 $slider_gambar=  FotoDashboard::find($id);



if($request->hasFile('gambar')){
            if($slider_gambar->gambar !==''){
            
                $gambar_path = public_path().'/slider/gambar/'.$slider_gambar->gambar;
                
                unlink($gambar_path);
                }
            $file=$request->file('gambar');
            $nameFile=Str::random(20,30).$file->getClientOriginalName();
            $file->move(public_path(). '/slider/gambar', $nameFile);
            $gambar_slider=$nameFile;
            $slider_gambar->gambar=$gambar_slider;
        }
        $slider_gambar->judul=$request->judul;
        $slider_gambar->urutan=$request->urutan;
              $slider_gambar->Update();
               Alert::success('Sukses', 'Berhasil Update Slider');
                return redirect()->back();
         }catch(\Exception $e)
       {
        //error jika data ada masalah
        Alert::info('Gagal', 'Gagal Update Data'.$e);
                return redirect()->back();

       }
   
}

public function hapus($id)
{
    try{
 $slider_gambar=  FotoDashboard::find($id);

                $gambar_path = public_path().'/slider/gambar/'.$slider_gambar->foto;
                
                unlink($gambar_path);
                $slider_gambar->delete();
                 Alert::success('Sukses', 'Berhasil Hapus Slider');
                return redirect()->back();
     }catch(\Exception $e)
       {
        //error jika data ada masalah
        Alert::info('Gagal', 'Gagal Hapus Data'.$e);
                return redirect()->back();

       }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FotoDashboard  $fotoDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(FotoDashboard $fotoDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FotoDashboard  $fotoDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoDashboard $fotoDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FotoDashboard  $fotoDashboard
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FotoDashboard  $fotoDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(FotoDashboard $fotoDashboard)
    {
        //
    }
}
