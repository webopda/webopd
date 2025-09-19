<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class VotingController extends Controller
{
    public function index()
    {
        $total = Voting::count();
        $puas = Voting::where('pilihan', 'puas')->count();
        $cukup = Voting::where('pilihan', 'cukup')->count();
        $tidak_puas = Voting::where('pilihan', 'tidak_puas')->count();

        return view('voting.index', compact('total','puas','cukup','tidak_puas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pilihan' => 'required',

        ]);
$email = Session::get('login_google.email');
         if(!$email)
         {
            return redirect()->back()->with('error', 'Silahkan Login dengan AKun Google Anda Untuk Memberikan Voting');
         }
        // Cegah vote ganda per IP
        // $email = $request->email();
        // $cek = Voting::where('email', $email)->first();

        // if ($cek) {
        //     return redirect()->back()->with('error', 'Anda sudah memberikan suara.');
        // }

        Voting::create([
            'pilihan' => $request->pilihan,
            'email' => $email,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas pendapat Anda!');
    }
}
