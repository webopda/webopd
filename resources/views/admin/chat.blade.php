@extends('layout.template')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<h1 class="mb-4">Daftar Chat User</h1>

<table class="table table-bordered table-hover mb-3">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Pesan</th>
            <th>Time</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="chat-table-body"></tbody>
</table>

<!-- Chat Box Admin -->
<div id="chat-box" class="d-none position-fixed" style="bottom: 20px; right: 20px; width: 320px; height: 400px; z-index:1050;">
    <div class="card h-100">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <span>Balas Chat</span>
            <button id="chat-close" class="btn btn-sm btn-light">&times;</button>
        </div>
        <div id="messages" class="card-body overflow-auto" style="height: 300px;"></div>
        <div class="card-footer d-flex p-2">
            <input type="text" id="reply-message" placeholder="Ketik balasan..." class="form-control form-control-sm mr-2">
            <button id="reply-btn" class="btn btn-success btn-sm">➤</button>
        </div>
    </div>
</div>

<script>
const tbody = document.getElementById('chat-table-body');
const chatBox = document.getElementById('chat-box');
const chatClose = document.getElementById('chat-close');
const messages = document.getElementById('messages');
const replyMessage = document.getElementById('reply-message');
const replyBtn = document.getElementById('reply-btn');

let currentChatId = null;
let lastMessageId = 0;

chatClose.onclick = () => chatBox.classList.add('d-none');

// Load semua chat user
function loadChats(){
    axios.get("{{ route('admin.getChats') }}")
        .then(res=>{
            tbody.innerHTML='';
            res.data.forEach((chat,index)=>{
                const tr = document.createElement('tr');
                tr.innerHTML=`
                    <td>${index+1}</td>
                    <td>${chat.username}</td>
                    <td>${chat.message}</td>
                    <td>${chat.time}</td>
                    <td>${chat.status??'-'}</td>
                    <td>
                        <button onclick="selectChat(${chat.id}, '${chat.username}')" class="btn btn-success btn-sm">Balas</button>
                    </td>`;
                tbody.appendChild(tr);
            });
        });
}

// Pilih chat untuk dibalas
function selectChat(id, username){
    currentChatId = id;
    chatBox.classList.remove('d-none');

    axios.get(`/admin/chat/thread/${id}`)
        .then(res=>{
            messages.innerHTML = '';
            lastMessageId = 0;
            res.data.forEach(chat=>{
                appendMessage(chat.username, chat.message, chat.is_admin, chat.time);
                lastMessageId = Math.max(lastMessageId, chat.id);
            });
            replyMessage.focus();
        });
}

// Tambahkan pesan ke chat box
function appendMessage(username, message, isAdmin=false, created_at=null){
    const el = document.createElement('div');
    el.classList.add('mb-2');
    el.innerHTML = isAdmin
        ? `<div class="d-flex justify-content-end">
             <div class="bg-primary text-white p-2 rounded">
               ${message} <br><small class="text-light">${created_at??''}</small>
             </div>
           </div>`
        : `<div class="d-flex justify-content-start">
             <div class="bg-light text-dark p-2 rounded">
               <small class="text-muted">${username}</small><br>
               ${message} <br><small class="text-muted">${created_at??''}</small>
             </div>
           </div>`;
    messages.appendChild(el);
    messages.scrollTop = messages.scrollHeight;
}

// Balas pesan
replyBtn.addEventListener('click', function(){
    const msg = replyMessage.value.trim();
    if(!currentChatId || !msg) return alert('Pilih chat dan ketik pesan');

    axios.post(`/admin/chat/reply/${currentChatId}`, {message: msg})
        .then(res=>{
            appendMessage('Admin', msg, true, res.data.created_at ?? null);
            replyMessage.value='';
            loadChats();
        });
});

// Polling pesan baru tanpa berkedip
function pollNewMessages(){
    if (!currentChatId) return;

    axios.get(`/admin/chat/thread/${currentChatId}?after=${lastMessageId}`)
        .then(res=>{
            res.data.forEach(chat=>{
                appendMessage(chat.username, chat.message, chat.is_admin, chat.created_at);
                lastMessageId = Math.max(lastMessageId, chat.id);
            });
        });
}

// Jalankan polling setiap 3 detik
setInterval(pollNewMessages, 3000);

// Load chat awal
loadChats();
</script>
@endsection
