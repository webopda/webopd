@php
   $alamat = DB::table('kontak')
            ->where('nama', 'Alamat')
            ->value('keterangan');

            $email = DB::table('kontak')
            ->where('nama', 'Email')
            ->value('keterangan');

            $ig = DB::table('kontak')
            ->where('nama', 'Instagram')
            ->value('keterangan');

            $fb = DB::table('kontak')
            ->where('nama', 'Facebook')
            ->value('keterangan');

            $tiktok = DB::table('kontak')
            ->where('nama', 'TikTok')
            ->value('keterangan');
@endphp

<footer class="bg-gradient-to-r from-blue-700 to-blue-900 text-white">
  <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-4 gap-8">
    
    <!-- Logo & Deskripsi -->
    <div>
      <h6 class="text-2xl font-bold mb-3 border-b-2 border-red-600 w-[360]">RSUD Sadikin Kota Pariaman</h6>
      <p class="text-sm text-gray-200">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127667.3149962615!2d99.9854718433594!3d-0.594437299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4e27ee01cde39%3A0x16c42211261ad57f!2sRSUD%20Dr.%20Sadikin%20Kota%20Pariaman!5e0!3m2!1sid!2sid!4v1756694720826!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      </p>
    </div>
    
    <!-- Navigasi -->
    <div>
      <h3 class="font-semibold text-lg mb-3 border-b-2 border-red-600 w-36">Link Terkait</h3>
      <ul class="space-y-2">
        <li><a href="https://bpjs-kesehatan.go.id/#/" target="_blank" class="hover:text-yellow-400">BPJS Kesehatan</a></li>
        <li><a href="https://kemkes.go.id/id/home"  target="_blank" class="hover:text-yellow-400">Kementrian Kesehatan</a></li>
        <li><a href="https://pariamankota.go.id"  target="_blank" class="hover:text-yellow-400">Kota Pariaman</a></li>
      </ul>
    </div>
    
    <!-- Kontak -->
    <div>
      <h3 class="font-semibold text-lg mb-3 border-b-2 border-red-600 w-14">Kontak</h3>
      <ul class="space-y-2 text-sm">
    <li class="flex items-center space-x-2">
        <img src="{{ asset('sosmed/alamat.png') }}" class="w-5 h-5" alt="Alamat">
        <span>{{ $alamat }}</span>
    </li>

    <li class="flex items-center space-x-2">
        <img src="{{ asset('sosmed/gmail.png') }}" class="w-5 h-5" alt="Email">
        <span>{{ $email }}</span>
    </li>
</ul>

    </div>
    
    <!-- Sosial Media  ganti jika ada yang cocok -->
    <div>
      <h3 class="font-semibold text-lg mb-3 border-b-2 border-red-600 w-[110px] ">Ikuti Kami</h3>
      <div class="flex space-x-4">
        <a target="_blank" href="{{ $ig }}" class="hover:text-yellow-400"><img src="{{asset('sosmed/instagram.png')}}" width="40px" height="40px"></a>
         <a target="_blank" href="{{ $fb }}" class="hover:text-yellow-400"><img src="{{asset('sosmed/facebook.png')}}" width="40px" height="40px"></a>
        <a target="_blank" href="{{ $tiktok }}" class="hover:text-yellow-400"><img src="{{asset('sosmed/tiktok.png')}}" width="40px" height="40px"></a>
      </div>
    </div>
  </div>

  <!-- Copyright  untuk pembuat-->
  <div class="border-t border-gray-600 text-center py-4 text-sm text-gray-300">
    © 2025 Diskominfo Kota Pariaman. Semua Hak Dilindungi.
  </div>
</footer>

   {{-- <!-- Floating Button -->
<div id="chat-toggle"
     class="fixed bottom-5 right-5 w-14 h-14 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-lg cursor-pointer hover:bg-blue-600 transition">
  💬
</div>

<!-- Chat Box -->
<div id="chat-box"
     class="hidden fixed bottom-20 right-5 w-96 bg-white rounded-lg shadow-2xl flex flex-col">
  
  <!-- Header -->
  <div class="bg-blue-500 text-white p-3 rounded-t-lg flex justify-between items-center">
    <span class="font-semibold">Realtime Chat</span>
    <button id="chat-close" class="text-white text-lg">&times;</button>
  </div>

  <!-- Messages -->
  <div id="messages" class="h-64 overflow-y-auto border-b p-3 text-sm bg-gray-50"></div>

  <!-- Form -->
  <form id="chat-form" class="flex space-x-2 p-3">
      <input type="text" id="username" placeholder="Nama"
             class="border p-2 flex-1 rounded text-sm" required>
      <input type="text" id="message" placeholder="Tulis pesan..."
             class="border p-2 flex-1 rounded text-sm" required>
      <button type="submit"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">➤</button>
  </form>
</div> --}}

<!-- Script -->
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const chatToggle = document.getElementById('chat-toggle');
  const chatBox    = document.getElementById('chat-box');
  const chatClose  = document.getElementById('chat-close');
  const messages   = document.getElementById('messages');
  const form       = document.getElementById('chat-form');

  // Toggle buka/tutup chat
  chatToggle.onclick = () => chatBox.classList.toggle('hidden');
  chatClose.onclick  = () => chatBox.classList.add('hidden');

  // Tambah pesan ke UI
  function appendMessage(username, message, self = false) {
    const el = document.createElement('div');
    if (self) {
      el.innerHTML = `
        <div class="flex justify-end mb-2">
          <div class="bg-blue-500 text-white px-3 py-2 rounded-lg max-w-xs">
            <p>${message}</p>
          </div>
        </div>
      `;
    } else {
      el.innerHTML = `
        <div class="flex justify-start mb-2">
          <div class="bg-gray-200 text-gray-800 px-3 py-2 rounded-lg max-w-xs">
            <strong class="block text-xs text-gray-500">${username}</strong>
            <p>${message}</p>
          </div>
        </div>
      `;
    }
    messages.appendChild(el);
    messages.scrollTop = messages.scrollHeight;
  }

  // Kirim pesan
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    let username = document.getElementById('username').value.trim();
    let message  = document.getElementById('message').value.trim();

    if (!message || !username) return;

    // tampilkan dulu di UI
    appendMessage(username, message, true);

    // kirim ke backend
    axios.post("{{ route('chat.store') }}", {
      username: username,
      message: message
    })
    .then(() => {
      document.getElementById('message').value = '';
    })
    .catch(err => console.error(err));
  });
</script>
 --}}


 <!-- Floating Button -->
{{-- <div id="chat-toggle"
     class="fixed bottom-5 right-5 w-14 h-14 bg-green-500 text-white flex items-center justify-center rounded-full shadow-lg cursor-pointer hover:bg-green-600 transition z-50">
  💬
</div> --}}
{{-- 
<div id="chat-box"
     class="hidden fixed bottom-20 right-5 w-80 h-96 bg-white rounded-lg shadow-2xl flex flex-col">
  
  <!-- Header -->
  <div class="bg-green-500 text-white p-3 rounded-t-lg flex justify-between items-center">
    <span class="font-semibold">Live Chat</span>
    <button id="chat-close" class="text-white text-lg">&times;</button>
  </div>

  <!-- Messages -->
  <div id="messages" class="flex-1 p-3 overflow-y-auto text-sm space-y-2 bg-gray-50">
    <!-- Pesan masuk di sini -->
  </div>

  <!-- Form -->
<form id="chat-form" class="flex border-t">
  @csrf
  <input type="hidden" id="username" value="Guest">
  <input type="text" id="message" placeholder="Ketik pesan..."
         class="flex-1 p-2 text-sm outline-none"
         required>
  <button type="submit" class="bg-green-500 text-white px-4 hover:bg-green-600">➤</button>
</form>
</div>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher-js@7.2.0/dist/web/pusher.min.js"></script>
<script src="{{ mix('js/app.js') }}" defer></script>

<script>
  const chatToggle = document.getElementById('chat-toggle');
  const chatBox    = document.getElementById('chat-box');
  const chatClose  = document.getElementById('chat-close');
  const messages   = document.getElementById('messages');
  const form       = document.getElementById('chat-form');

  // Toggle open/close chat
  chatToggle.addEventListener('click', () => {
    chatBox.classList.toggle('hidden');
  });
  chatClose.addEventListener('click', () => {
    chatBox.classList.add('hidden');
  });

  // Laravel Echo / Pusher listen
  window.Echo.channel('chat')
    .listen('.chat-message', (e) => {
      const el = document.createElement('div');

      if (e.username === document.getElementById('username').value) {
        // Pesan User (kanan - hijau)
        el.innerHTML = `
          <div class="flex justify-end mb-2">
            <div class="bg-green-500 text-white px-3 py-2 rounded-lg max-w-xs">
              <p>${e.message}</p>
            </div>
          </div>
        `;
      } else {
        // Pesan lawan bicara (kiri - abu2)
        el.innerHTML = `
          <div class="flex justify-start mb-2">
            <div class="bg-gray-200 text-gray-800 px-3 py-2 rounded-lg max-w-xs">
              <strong class="block text-xs text-gray-500">${e.username}</strong>
              <p>${e.message}</p>
            </div>
          </div>
        `;
      }

      messages.appendChild(el);
      messages.scrollTop = messages.scrollHeight;
    });

  // Kirim pesan
  form.addEventListener('submit', function(e) {
    e.preventDefault();   // stop reload
    e.stopPropagation();  // cegah bubbling

    const username = document.getElementById('username').value.trim();
    const message  = document.getElementById('message').value.trim();

    if (!username || !message) {
      alert("Username dan pesan wajib diisi!");
      return false;
    }

    axios.post('/send-message', {
      username: username,
      message: message
    })
    .then(() => {
      document.getElementById('message').value = '';
    })
    .catch((err) => {
      console.error(err);
    });

    return false; // cegah reload di semua browser
  });
</script> --}}

<!-- Tombol Floating Chat --><div id="chat-toggle"
     class="fixed bottom-5 right-5 w-14 h-14 bg-green-500 text-white flex items-center justify-center rounded-full shadow-lg cursor-pointer hover:bg-green-600 transition z-50">
    💬
</div>

<!-- Chat Modal -->
<div id="chat-box"
     class="hidden fixed bottom-20 right-5 w-80 h-96 bg-white rounded-lg shadow-2xl flex flex-col z-50">

    <!-- Header -->
    <div class="bg-green-500 text-white p-3 rounded-t-lg flex justify-between items-center">
        <span class="font-semibold">Live Chat</span>
        <button id="chat-close" class="text-white text-lg">&times;</button>
    </div>

    <!-- Messages -->
    <div id="messages" class="flex-1 p-3 overflow-y-auto text-sm space-y-2 bg-gray-50"></div>

    <!-- Form Input Nama -->
    <div id="name-form" class="p-2 border-t flex {{ session()->has('username') ? 'hidden' : '' }}">
        <input type="text" id="username-input" placeholder="Masukkan nama..." class="flex-1 p-2 text-sm outline-none">
        <button id="set-username-btn" class="bg-green-500 text-white px-4 ml-2 rounded hover:bg-green-600">✔</button>
    </div>

    <!-- Form Input Chat -->
    <div id="chat-form" class="p-2 border-t flex {{ session()->has('username') ? '' : 'hidden' }}">
        <input type="hidden" id="username" value="{{ session('username') }}">
        <input type="text" id="message" placeholder="Ketik pesan..." class="flex-1 p-2 text-sm outline-none">
        <button id="send-btn" class="bg-green-500 text-white px-4 ml-2 rounded hover:bg-green-600">➤</button>
    </div>
</div>

<script>
const chatToggle = document.getElementById('chat-toggle');
const chatBox = document.getElementById('chat-box');
const chatClose = document.getElementById('chat-close');
const messages = document.getElementById('messages');

const nameForm = document.getElementById('name-form');
const usernameInput = document.getElementById('username-input');
const setUsernameBtn = document.getElementById('set-username-btn');

const chatForm = document.getElementById('chat-form');
const usernameHidden = document.getElementById('username');
const messageInput = document.getElementById('message');
const sendBtn = document.getElementById('send-btn');

// Toggle chat box
chatToggle.onclick = () => chatBox.classList.toggle('hidden');
chatClose.onclick = () => chatBox.classList.add('hidden');

// Append message ke chat box dengan waktu
function appendMessage(username, message, isAdmin=false, time=null){
    const el = document.createElement('div');
    el.classList.add('mb-2');
    el.innerHTML = isAdmin
        ? `<div class="flex justify-start">
             <div class="bg-blue-500 text-white px-3 py-2 rounded-lg max-w-xs">
               ${message}<br><small class="text-white/70 text-xs">${time??''}</small>
             </div>
           </div>`
        : `<div class="flex justify-end">
             <div class="bg-gray-200 px-3 py-2 rounded-lg max-w-xs">
               ${message}<br><small class="text-gray-500 text-xs">${time??''}</small>
             </div>
           </div>`;
    messages.appendChild(el);
    messages.scrollTop = messages.scrollHeight;
}

// Load chat user + balasan admin
function loadChats(){
    const username = usernameHidden.value;
    if(!username) return;

    axios.get(`/user/chat/list?username=${username}`)
        .then(res=>{
            messages.innerHTML = '';
            res.data.forEach(chat=>{
                appendMessage(chat.username, chat.message, chat.is_admin, chat.time);
            });
        });
}

// Set username ketika user submit nama
if(setUsernameBtn){
    setUsernameBtn.onclick = () => {
        const name = usernameInput.value.trim();
        if(!name) return alert('Nama harus diisi');

        axios.post('/user/chat/set-username', {username: name})
            .then(res=>{
                usernameHidden.value = name;
                nameForm.classList.add('hidden');
                chatForm.classList.remove('hidden');
                loadChats();
            });
    }
}

// Kirim pesan user
sendBtn.onclick = () => {
    const username = usernameHidden.value;
    const message = messageInput.value.trim();
    if(!message) return;

    axios.post(`/user/chat/send`, {username, message})
        .then(res=>{
            appendMessage(username, message, false, res.data.time); // tampilkan time
            messageInput.value = '';
        });
};

// Polling setiap 3 detik
setInterval(() => {
    if(usernameHidden.value) loadChats();
}, 3000);

// Load awal jika session sudah ada
if(usernameHidden.value){
    loadChats();
}
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
    <script src="{{ asset('widgetdisabilitas.js') }}"></script>

<script>
  var rellax = new Rellax('.rellax');
</script>
@include('sweetalert::alert')
