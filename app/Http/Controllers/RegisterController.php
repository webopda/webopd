<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
public function index()
{
    $user_data=User::get();
    return view('register.index',compact('user_data'));
}
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        alert::success('Berhasil','User Berhasil ditambahkan');
        return redirect()->back();
    }catch(\Exception $e)
    {
        alert::info('Info',"Gagal Menambahkan user");
        return redirect()->back();
    }
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'email'=>'required|unique:users,email,'.$id,
        ]);

      try{
          $user_data= User::find($id);
        $user_data->email=$request->email;
        $user_data->name=$request->name;
        $user_data->password=Hash::make($request->password);
        $user_data->update();
         alert::success('Berhasil','User Berhasil diupdate');
        return redirect()->back();
      }catch(\Exception $e)
      {
        alert::info('Info',"Gagal Update user");
        return redirect()->back();
      }
    }
    public function password(Request $request,$id)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

      try{
          $user_data= User::find($id);
        $user_data->password=Hash::make($request->password);
        $user_data->update();
         alert::success('Berhasil','Password User Berhasil diupdate');
        return redirect()->back();
      }catch(\Exception $e)
      {
        alert::info('Info',"Gagal Update Password User");
        return redirect()->back();
      }
    }

    public function hapus($id)
    {
     try{
          $user_data= User::find($id);
       
        $user_data->delete();
         alert::success('Berhasil','User Berhasil dihapus');
        return redirect()->back();
      }catch(\Exception $e)
      {
        alert::info('Info',"Gagal Hapus user");
        return redirect()->back();
      }   
    }
}
