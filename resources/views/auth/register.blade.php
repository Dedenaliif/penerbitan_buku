@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-50 m-10">
  <div class="w-full max-w-4xl bg-white p-10 border border-gray-200 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Daftar</h2>

    @if (session('success'))
      <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-200 rounded-lg text-sm">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <input type="hidden" name="role" id="" name="penulis" value="penulis">

      <!-- Informasi Login -->
      <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Login</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
          <label for="email" class="block text-sm text-gray-600 mb-1">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email"
            class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
          @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="block text-sm text-gray-600 mb-1">Password</label>
          <input id="password" type="password" name="password" required placeholder="Password"
            class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
          @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm text-gray-600 mb-1">Ulangi Password</label>
          <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Ulangi Password"
            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
        </div>
      </div>

      <!-- Informasi Akun -->
      <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Akun</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
          <label for="kategori" class="block text-sm text-gray-600 mb-1">Kategori Pendaftar</label>
          <select id="kategori" name="kategori_pendaftar" required
            class="w-full px-4 py-2 border @error('kategori_pendaftar') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm appearance-none bg-white">
            <option value="">Pilih Kategori</option>
            <option value="CRP" {{ old('kategori_pendaftar') == 'CRP' ? 'selected' : '' }}>CRP</option>
            <option value="Umum" {{ old('kategori_pendaftar') == 'Umum' ? 'selected' : '' }}>Umum</option>
          </select>
          @error('kategori_pendaftar')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="referensi_kontak" class="block text-sm text-gray-600 mb-1">Referensi Kontak</label>
          <select id="referensi_kontak" name="referensi_kontak" required
            class="w-full px-4 py-2 border @error('referensi_kontak') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm appearance-none bg-white">
            <option value="">Pilih Referensi</option>
            <option value="Email" {{ old('referensi_kontak') == 'Email' ? 'selected' : '' }}>Email</option>
            <option value="Nomor Telepon" {{ old('referensi_kontak') == 'Nomor Telepon' ? 'selected' : '' }}>Nomor Telepon</option>
          </select>
          @error('referensi_kontak')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
          <label for="nama_depan" class="block text-sm text-gray-600 mb-1">Nama Depan</label>
          <input id="nama_depan" type="text" name="nama_depan" value="{{ old('nama_depan') }}" required placeholder="Nama Depan"
            class="w-full px-4 py-2 border @error('nama_depan') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
          @error('nama_depan')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="nama_belakang" class="block text-sm text-gray-600 mb-1">Nama Belakang</label>
          <input id="nama_belakang" type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" required placeholder="Nama Belakang"
            class="w-full px-4 py-2 border @error('nama_belakang') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
          @error('nama_belakang')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="jenis_kelamin" class="block text-sm text-gray-600 mb-1">Jenis Kelamin</label>
          <select id="jenis_kelamin" name="jenis_kelamin" required
            class="w-full px-4 py-2 border @error('jenis_kelamin') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm appearance-none bg-white">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
          @error('jenis_kelamin')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="nomor_handphone" class="block text-sm text-gray-600 mb-1">Nomor Handphone</label>
          <input id="nomor_handphone" type="text" name="nomor_handphone" value="{{ old('nomor_handphone') }}" required placeholder="08xxxxxxxxxx"
            class="w-full px-4 py-2 border @error('nomor_handphone') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
          @error('nomor_handphone')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="pekerjaan" class="block text-sm text-gray-600 mb-1">Pekerjaan</label>
          <input id="pekerjaan" type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Pekerjaan"
            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
        </div>

        <div>
          <label for="instansi" class="block text-sm text-gray-600 mb-1">Instansi / Perusahaan</label>
          <input id="instansi" type="text" name="instansi_perusahaan" value="{{ old('instansi_perusahaan') }}" placeholder="Instansi / Perusahaan"
            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">
        </div>

        <div class="md:col-span-2">
          <label for="alamat" class="block text-sm text-gray-600 mb-1">Alamat</label>
          <textarea id="alamat" name="alamat" rows="3" required placeholder="Alamat lengkap"
            class="w-full px-4 py-2 border @error('alamat') border-red-500 @else border-gray-200 @enderror rounded-lg focus:ring-2 focus:ring-blue-200 focus:outline-none text-sm">{{ old('alamat') }}</textarea>
          @error('alamat')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Tombol -->
      <div class="mt-8">
        <button type="submit"
          class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-semibold transition">
          Daftar
        </button>
      </div>

      <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Sudah punya akun?
          <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
        </p>
      </div>
    </form>
  </div>
</section>
@endsection
