<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessageSent;
use App\Models\Chat;
class ChatController extends Controller
{
    public function send(Request $request)
    {

        // $request->validate([
        //     'username' => 'required|string',
        //     'message'  => 'required|string',
        // ]);

        // $chat = Chat::create([
        //     'username' => $request->username,
        //     'message'  => $request->message,
        //     'is_admin' => $request->is_admin ?? false,
        // ]);

        // broadcast(new ChatMessageSent($chat))->toOthers();

        // return response()->json($chat);
         $request->validate([
        'username' => 'required|string',
        'message' => 'required|string',
    ]);
 if (!$request->session()->has('username')) {
        $request->session()->put('username', 'Guest' . rand(100,999));
    }
        $username = $request->session()->get('username'); // ambil dari session

    $chat = Chat::create([
        'username' => $request->username,
        'message' => $request->message,
        'is_admin' => false,
        'time'=>date('H:i:s'),
        'status' => 'pending', // optional
    ]);

    return response()->json($chat);
    
    }
     public function setUsername(Request $request)
    {
       $request->validate([
            'username' => 'required|string|max:50',
        ]);

        // cek apakah nama sudah ada
        $exists = Chat::where('username', $request->username)->exists();
        if($exists){
            return response()->json(['success' => false, 'message' => 'Nama sudah dipakai'], 409);
        }

        // simpan ke database
        $user = Chat::create(['username' => $request->username]);

        // simpan ke session
        session(['username' => $request->username]);

        return response()->json(['success' => true]);
    }
    public function getChatsForUser(Request $request)
{
// $username = $request->session()->get('username');

// // Ambil chat user + balasan admin hanya untuk user itu
// $chats = Chat::where('username', $username)
//              ->orWhere(function($q) use ($username) {
//                  $q->where('is_admin', true)
//                    ->where('reply_to', $username); // catatan: perlu kolom reply_to di DB
//              })
//              ->orderBy('created_at','asc')
//              ->get();

//     return response()->json($chats);
$username = $request->session()->get('username');

    if(!$username) return response()->json([]);

    // Ambil chat user + balasan admin untuk user itu
    $chats = Chat::where('username', $username)
                 ->orWhere(function($q) use ($username) {
                     $q->where('is_admin', true)
                       ->where('reply_to', $username);
                 })
                 ->orderBy('created_at','asc')
                 ->get();

    return response()->json($chats);
}
//     public function store(Request $request)
// {
//     $chat = Chat::create([
//         'username' => $request->username,
//         'message'  => $request->message,
//         'is_admin' => $request->is_admin ?? 0, // kalau ada input hidden
//     ]);

//     broadcast(new ChatMessageSent($chat))->toOthers();

//     return response()->json(['success' => true]);
// }
public function index()
{
    return view('admin.chat');
}

public function getChats()
{
    // Ambil semua chat dari user tanpa tergantung tipe is_admin
    $chats = Chat::orderBy('created_at','asc')->get()->map(function($chat){
        // pastikan is_admin boolean
        $chat->is_admin = (bool) $chat->is_admin;
        return $chat;
    });

    // Debug (hanya untuk testing, hapus setelah yakin)
    // dd($chats);

    return response()->json($chats);
}


// public function replyChat(Request $request, $id)
// {
//     $chat = Chat::find($id);
//     $chat->status = 'replied';
//     $chat->save();

//     $reply = Chat::create([
//         'username' => 'Admin',
//         'message' => $request->message,
//         'is_admin' => 1,
//         'status' => 'replied',
//     ]);

//     broadcast(new ChatMessageSent($reply))->toOthers();

//     return response()->json($reply);
// }
 public function getChatThread($id){
        $chatUser = Chat::findOrFail($id);
        $chats = Chat::where('username',$chatUser->username)
                     ->orWhere('is_admin',true)
                     ->orderBy('created_at','asc')
                     ->get();
        return response()->json($chats);
    }
public function replyChat(Request $request, $id)
{
    // $request->validate([
    //     'message' => 'required|string'
    // ]);

    // // Ambil chat user untuk username
    // $userChat = Chat::findOrFail($id);

    // // Buat pesan baru untuk admin
    // Chat::create([
    //     'username' => 'Admin',
    //     'message' => $request->message,
    //     'is_admin' => true,
    //     'status' => 'replied',
    // ]);

    // return response()->json(['success'=>true]);
     $request->validate([
        'message' => 'required|string',
        
    ]);

    $user = Chat::find($id); // chat user yang dipilih
    if(!$user) return response()->json(['error' => 'User chat tidak ditemukan'], 404);

    $chat = Chat::create([
        'username' => 'Admin',
        'message' => $request->message,
        'is_admin' => true,
        'time'=>date('H:i:s'),
        'reply_to' => $user->username, // penting
    ]);

    return response()->json($chat);
}

public function store(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'message' => 'required|string',
    ]);

    $chat = Chat::create([
        'username' => $request->username,
        'time'=>date('H:i:s'),
        'message' => $request->message,
        'is_admin' => $request->is_admin ?? 0,
    ]);

    broadcast(new ChatMessageSent($chat))->toOthers();

    return response()->json($chat);
}

}
