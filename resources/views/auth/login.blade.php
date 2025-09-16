<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSUD Sadikin Kota Pariaman</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-cyan-400 to-blue-600 min-h-screen flex items-center justify-center">

  <div class="bg-white rounded-2xl shadow-xl flex flex-col md:flex-row w-full max-w-4xl overflow-hidden">
    
    <!-- Form Left -->
    <div class="md:w-1/2 p-8 md:p-12">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Silahkan Login</h2>

      <form method="POST" action="{{ route('login') }}">
        @csrf

       

        <!-- User ID -->
        <div class="mb-4">
          <label class="block text-gray-700">Email</label>
          <input type="email" name="email" placeholder="Enter User ID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        @error('email')
            <span class="text-red-400">{{$message}}</span>
        @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block text-gray-700">Password</label>
          <input type="password" name="password" placeholder="Enter Password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        @error('password')
            <span class="text-red-400">{{$message}}</span>
        @enderror
        </div>

       

        <!-- Buttons -->
        <div class="flex flex-col md:flex-row items-center justify-between">
          {{-- <a href="#" class="text-sm text-indigo-600 hover:underline mb-2 md:mb-0">Forgot Password?</a> --}}
          <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">Log In</button>
        </div>

      </form>
    </div>

    <!-- Image Right -->
    <div class="md:w-1/2 bg-gradient-to-tr  relative hidden md:flex items-center justify-center">
      <img src="{{ asset('login.png') }}"  alt="Doctor Illustration" class="absolute bottom-0 left-0 w-full right-0 h-full object-cover">
      <!-- Optional: overlay text or badges -->
          </div>

  </div>

</body>
</html>
