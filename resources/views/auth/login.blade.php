@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        showConfirmButton: true,
        // timer: 2500
    });
</script>
@endif
<section class="min-h-screen flex items-center justify-center bg-white">
  <div class="w-full max-w-md bg-white p-8 border border-gray-200 rounded-lg shadow-sm">
    <h2 class="text-2xl font-bold text-center text-black mb-6">Login</h2>
    @if (session('status'))
      <div class="mb-4 text-sm text-red-600">
        {{ session('status') }}
      </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" type="email"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none @error('email') border-red-500 @enderror"
          name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" type="password"
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none @error('password') border-red-500 @enderror"
          name="password" required placeholder="Password">
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-6">
        <button type="submit"
          class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-semibold transition">
          Masuk
        </button>
      </div>

      <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Belum punya akun?
          <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
      </div>
    </form>
  </div>
</section>
@endsection
