@extends('layout.index')
@section('content')
<section>
    <div class="bg-white text-center h-90">
        <h1 class="font-bold text-black text-4xl pt-30">Paket Penerbitan Buku</h1>
        <p class="pt-5">Kami menyediakan beragam paket penerbitan dan layanan yang bisa disesuaikan <br>
            dengan kebutuhan masing-masing penulis.</p>
    </div>
</section>

<!--Paket Mokekar Dasar-->
<section class="container mx-auto bg-white text-[#1e1e1e] font-sans">
    <div class="flex justify-center gap-5 py-12">
      <div class="mb-10">
        <h2 class="text-xl font-semibold">Paket Motekar Dasar</h2>
        <p class="text-sm text-gray-600 mt-1">Buku diterbitkan dalam format digital (termasuk serah <br> simpan e-deposit Perpusnas) dengan ukuran B5.</p>
      </div>
      @foreach ($dasar as $ds)
      <div class="border rounded-lg shadow-sm p-6">
        <h3 class="text-sm font-semibold text-gray-600 mb-2">Motekar Dasar - {{ $ds->instansi }}</h3>
        <p class="text-2xl font-bold mb-4">Rp. {{ number_format($ds->harga, 0) }}<span class="text-sm font-normal text-gray-500">/ 100 hal</span></p>
        <a href="{{ url('paket-penerbitan/'.$ds->id) }}" class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">Lihat Paket</a>
        <hr class="my-6">
        <h4 class="text-sm font-semibold mb-3">Paket sudah termasuk:</h4>
        <ul class="space-y-2 text-sm text-gray-700">
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Review Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Desain Cover</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Layout Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Editing</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Proofread</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Dummy Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> E-ISBN</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Pemasaran Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Royalti</li>
        </ul>
      </div>
      @endforeach
    </div>
  </section>


<!--Paket Motekar Kombo I-->
<section class="container mx-auto bg-white text-[#1e1e1e] font-sans">
  <div class="flex justify-center gap-5 py-12">
    <div class="mb-10">
      <h2 class="text-xl font-semibold">Paket Motekar Kombo I</h2>
      <p class="text-sm text-gray-600 mt-1">Buku diterbitkan dalam format digital dan cetak <br>
        sebanyak 10 eksemplar buku (termasuk serah dan e- <br>
        deposit Perpusnas) dengan ukuran buku A5 atau <br>
        ukuran buku Standar.</p>
      <p class="text-sm text-gray-600 mt-4">Catatan: <br>
        Cetakan buku masih dalam format hitam putih, apabila <br>
        ada penambahan cetakan warna akan diperhitungkan <br>
        dalam biaya cetak.</p>
    </div>
    @foreach ($kombo1 as $kb1)
    <div class="border rounded-lg shadow-sm p-6 border">
        <h3 class="text-sm font-semibold text-gray-600">Motekar Kombo I - {{ $kb1->instansi }}</h3>
        <p class="text-2xl font-bold mb-4">Rp. {{ number_format($kb1->harga, 0) }}<span class="text-sm font-normal text-gray-500">/ 100 hal</span></p>
        <a href="{{ url('paket-penerbitan/'.$kb1->id) }}" class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">Lihat Paket</a>
        <hr class="my-6">
        <h4 class="text-sm font-semibold mb-3">Paket sudah termasuk:</h4>
        <ul class="space-y-2 text-sm text-gray-700">
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Review Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Desain Cover</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Layout Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Editing</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Proofread</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Dummy Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> E-ISBN</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Pemasaran Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Royalti</li>
        </ul>
      </div>
    @endforeach
  </div>
</section>

<!--Paket Motekar Kombo II-->
<section class="container mx-auto bg-white text-[#1e1e1e] font-sans">
  <div class="flex justify-center gap-5 py-12">
    <div class="mb-10">
      <h2 class="text-xl font-semibold">Paket Motekar Kombo II</h2>
      <p class="text-sm text-gray-600 mt-1">Buku diterbitkan dalam format digital dan cetak <br>
        sebanyak 10 eksemplar buku (termasuk serah dan e- <br>
        deposit Perpusnas) dengan ukuran buku B5.</p>
      <p class="text-sm text-gray-600 mt-4">Catatan: <br>
        Cetakan buku masih dalam format hitam putih, apabila <br>
        ada penambahan cetakan warna akan diperhitungkan <br>
        dalam biaya cetak.</p>
    </div>
    @foreach ($kombo2 as $kb2)
    <div class="border rounded-lg shadow-sm p-6 border">
        <h3 class="text-sm font-semibold text-gray-600">Motekar Kombo II - {{ $kb2->instansi }}</h3>
        <p class="text-2xl font-bold mb-4">Rp. {{ number_format($kb2->harga, 0) }}<span class="text-sm font-normal text-gray-500">/ 100 hal</span></p>
        <a href="{{ url('paket-penerbitan/'.$kb2->id) }}" class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">Lihat Paket</a>
        <hr class="my-6">
        <h4 class="text-sm font-semibold mb-3">Paket sudah termasuk:</h4>
        <ul class="space-y-2 text-sm text-gray-700">
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Review Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Desain Cover</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Layout Naskah</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Editing</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Proofread</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Dummy Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> E-ISBN</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Pemasaran Buku</li>
          <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Royalti</li>
        </ul>
      </div>
    @endforeach
  </div>
</section>

<section class="container mx-auto bg-white text-[#1e1e1e] font-sans">
  <div class="flex justify-center gap-5 py-12">
    <div class="mb-10">
      <h2 class="text-xl font-semibold">Custom / Cetak Ulang</h2>
      <p class="text-sm text-gray-600 mt-1">Penulis dapat memilih layanan sendiri sesuai <br>
        kebutuhan.</p>
    </div>
    <div class="border rounded-lg shadow-sm p-10 ml-5">
      <h3 class="text-sm font-semibold text-gray-600">Motekar Custom</h3>
      <p class="text-sm font-normal text-gray-500 mt-4 mb-4">Informasi Selengkapnya</p>
      <a href="{{ url('contact') }}" class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">Hubungi Kami</a>
      <hr class="my-6">
      <h4 class="text-sm font-semibold mb-3">Paket sudah termasuk:</h4>
      <ul class="space-y-2 text-sm text-gray-700">
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Review Naskah</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Desain Cover</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Layout Naskah</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Editing</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Proofread</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Dummy Buku</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> E-ISBN</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Pemasaran Buku</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Royalti</li>
      </ul>
    </div>
    <div class="border rounded-lg shadow-sm p-10">
      <h3 class="text-sm font-semibold text-gray-600">Motekar Cetak Ulang</h3>
      <p class="text-sm font-normal text-gray-500 mt-4 mb-4">Informasi Selengkapnya</p>
      <a href="{{ url('contact') }}" class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium hover:bg-gray-100">Hubungi Kami</a>
      <hr class="my-6">
      <h4 class="text-sm font-semibold mb-3">Paket sudah termasuk:</h4>
      <ul class="space-y-2 text-sm text-gray-700">
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Review Naskah</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Desain Cover</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Layout Naskah</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Editing</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Proofread</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Dummy Buku</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> E-ISBN</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Pemasaran Buku</li>
        <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Royalti</li>
      </ul>
    </div>
  </div>
</section>

<div class="text-center h-44" >
  <p class="text-sm font-normal text-gray-500 py-20">Semua paket belum termasuk biaya ongkos kirim untuk pengiriman buku dan biaya transaksi (bisa dilihat saat <br>
    checkout). Biaya ongkos kirim bisa gratis bagi penulis yang ingin mengambil langsung ke CRP Press.</p>
</div>

<div>
  <hr class="mx-40">
</div>

<div>
    <h1 class="container mx-auto text-black h-15 pt-5 pl-10">© 2025 RCP. All Rights Reserved</h1>
  </div>
@endsection