<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
</head>
<body class="bg-white">
    <section class="bg-[#4285F4] py-6">
        <!--Navbar Start-->
        <!--Navbar Start-->
        <nav class="flex container mx-auto bg-[#4285F4] text-white">
            <!-- Kiri - Menu -->
           <ul class="flex items-center space-x-6 text-base font-medium text-white">
               <li><a href="/" class="hover:underline">Beranda</a></li>
               <li><a href="{{ url('profil') }}" class="hover:underline">Tentang Kami</a></li>

               <!-- Dropdown Layanan -->
               <li class="relative group">
                   <button class="flex items-center gap-1 hover:underline transition duration-200">
                     Layanan
                     <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                     </svg>
                   </button>

                   <ul class="absolute left-0 mt-2 w-56 bg-white text-black rounded-xl shadow-2xl transform scale-95 group-hover:scale-100 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-out z-10">
                     <li>
                       <a href="{{ url('penerbitan-buku') }}" class="block px-5 py-3 hover:bg-gray-100 rounded-t-xl">Penerbitan Buku</a>
                     </li>
                     <li>
                       <a href="{{ url('harga-paket') }}" class="block px-5 py-3 hover:bg-gray-100 rounded-b-xl">Harga Paket Penerbitan</a>
                     </li>
                   </ul>
                 </li>

           <!--Kontak-->
               <li><a href="{{ url('contact') }}" class="hover:underline">Kontak</a></li>
           </ul>

           <!-- Tengah - Search -->
           <div class="flex-1 flex justify-start px-6">
            <input type="text" placeholder="Cari ..." class="w-full max-w-md px-4 py-2 rounded-md text-black bg-white border border-white focus:outline-none" />
        </div>


            @guest
            <div class="flex items-center space-x-4">
            <a href="{{ url('login') }}" class="bg-white text-black px-4 py-2 rounded-md hover:bg-gray-200">Masuk</a>
            <a href="{{ url('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Register</a>
        </div>
        @endguest
        <!-- Kanan - btn -->

        @auth
        <div class="relative">
            <!-- Button -->
            <button onclick="toggleDropdown()" class="flex items-center gap-2 bg-white text-black px-2 py-2 rounded-full hover:bg-gray-100" id="profile-button">
            <img src="{{ asset('assets/image/ikon/profilikon.svg') }}" alt="Avatar" class="w-8 h-8 rounded-full">
            </button>

            <!-- Dropdown -->
            <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white text-gray-800 rounded-xl shadow-xl z-20 transition-all duration-300 ease-out">
            <!-- Header -->
            <div class="flex items-center gap-3 px-5 py-4 border-b">
                <img src="{{ asset('assets/image/ikon/profilikon.svg') }}" alt="User" class="w-12 h-12 rounded-full">
                <div>
                <p class="text-sm font-semibold">{{ $auth->nama_depan }}</p>
                <p class="text-xs text-gray-500">{{ $auth->email }}</p>
                </div>
            </div>

            <!-- Menu Items -->
            <ul class="py-2 text-sm">
                @if(Auth::user()->role == 'penulis')
                <li>
                <a href="{{ url('dashboard') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/dashboardikon.svg') }}" alt="dashboard">
                    Dashboard
                </a>
                </li>
                <li>
                <a href="{{ url('naskah-buku') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/ikonnaskah.svg') }}" alt="naskah">
                    Naskah Buku
                </a>
                </li>
                <li>
                <a href="{{ url('daftar-alamat') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/lokasidashboard.svg') }}" alt="alamat">
                    Daftar Alamat
                </a>
                </li>
                <li>
                <a href="{{ url('ubah-password') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/ubahsandi.svg') }}" alt="sandi">
                    Ubah Password
                </a>
                </li>
                @endif
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="{{ url('review-naskah') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2m4 2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2z" />
                        </svg>
                    Review Naskah
                    </a>
                </li>
                <li>
                    <a href="{{ url('verifikasi-pembayaran') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-2.28 0-4 .895-4 2s1.72 2 4 2 4 .895 4 2-1.72 2-4 2m0-10v2m0 8v2" />
                    </svg>
                    Verifikasi Pembayaran
                    </a>
                </li>
                @endif
            </ul>

            <!-- Logout -->
            <div class="border-t">
                <a href="{{ url('logout') }}" class="flex items-center gap-2 px-5 py-3 text-red-600 hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                </svg>
                Keluar
                </a>
            </div>
            </div>
        </div>
        @endauth
        <script>
            function toggleDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('hidden');
            }

            // Close dropdown jika klik di luar
            window.addEventListener('click', function(e) {
            const button = document.getElementById('profile-button');
            const dropdown = document.getElementById('profile-dropdown');
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
            });
        </script>
        </nav>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:p-2 mt-15">
                <div class="mt-12">
                    <h1 class="text-white text-4xl mt-5 font-bold">Selamat Datang Di Laman CRP Press</h1>
                    <p class="my-2 text-white">sebagai penerbit akademis, CRP telah menerbitkan <br> buku-buku untuk kepentingan akademis, <br>
                        pendidikan dan kebudayaan.</p>
                    <div class="flex justify-start space-x-4 mt-2">
                        <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Belanja Buku</a>
                        <a href="{{ url('penerbitan-buku') }}" class="bg-white text-black px-4 py-2 rounded-md hover:bg-gray-200">Ingin Terbitkan Buku?</a>
                    </div>
                </div>
                <div class="hidden lg:block">
                  <img src="{{ asset('assets/image/bukuopening2.png') }}" alt="buku">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-28 container mx-auto">
        <div class="grid grid-cols-2 mx-30">
           <div class=" pl-10">
               <h1 class="text-black text-4xl font-bold">Daftar layanan</h1>
               <p class="mt-2">CRP Press berkomitmen untuk memberikan jasa layanan <br>
                penerbitan bagi sivitas maupun nonsivitas CRP. Sebagai <br>
                penerbit perguruan tinggi, sejak tahun 2023, CRP Press <br>
                mendukung komunikasi ilmiah para pakar dan profesional <br>
                untuk mendiseminasikan berbagai karyanya melalui multi- <br>
                paltform bagi komunitas ilmiah.</p>
                <p>
                Selain itu, CRP Press juga memberikan layanan penebitan <br>
                untuk karya fiksi bagi masyarakat umum guna menyebarkan <br>
                hasil olah pikir kreatif.
                </p>
                <p>
                    Berikut daftar layanan yang disediakan oleh CRP Press:
                </p>
                <ul class="space-y-4 text-black mt-3 font-medium">
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Layanan Terpadu Penerbitan</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Penyunting Dan Pengaturan Tata Letak</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Desain Sampul Buku</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Pemasaran Buku</span>
                    </li>
                </ul>
           </div>
           <div>
            <img class="rounded-2xl h-full object-cover w-auto" src="{{ asset('assets/image/manusia.jpg') }}" alt="manusia">
           </div>
        </div>
    </section>

    <section class="mt-28 container mx-auto">
        <div class="grid grid-cols-2 mx-30">
            <div>
                <img class="rounded-2xl" src="{{ asset('assets/image/gambar2oren.jpg') }}" alt="oren">
            </div>
            <div class="pt-10 pl-20">
                <p class="text-purple-600 font-bold">LEBIH CEPAT DAN MUDAH</p>
                <h1 class="text-black text-4xl mt-4 font-bold">Ajukan Naskah Anda <br> Secara Daring</h1>
                <p class="text-black font-bold mt-5 text-xl">Pengajuan naskah kini bisa lebih lepat dan mudah.</p>
                <ul class="space-y-4 text-black mt-3 font-medium">
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Layanan Terpadu Penerbitan</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Editor dan Layouter Profesional</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Hemat Waktu dan Biaya Terjangkau</span>
                    </li>
                    <li class="flex items-center space-x-3">
                      <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                      </span>
                      <span>Format Buku Digital dan/atau Cetak</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                          </svg>
                        </span>
                        <span>Royalti Terjamin</span>
                      </li>
                      <li class="flex items-center space-x-3">
                        <span class="flex items-center justify-center w-6 h-6 bg-green-500 rounded-full text-yellow-500">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                          </svg>
                        </span>
                        <span>Pemasaran Buku Cetak dan Digital</span>
                      </li>
                </ul>
                </ul>
            </div>
        </div>
    </section>

    <section class="mt-28 container mx-auto">
      <div class="grid grid-cols-2 mx-30">
        <div class="pl-15 pt-5">
          <p class="text-purple-600 font-bold">kemudahan transaksi dan pengiriman</p>
          <h1 class="text-black text-4xl mt-4 font-bold">Berbagai pilihan jenis <br>
            pembayaran dan <br>
            pengiriman</h1>
          <p class="text-black font-bold mt-5 text-xl">CRP Press kini didukung berbagai pilihan jenis <br>
            pembayaran dan pengiriman untuk transaksi <br>
            penerbitan buku.</p>
            <div class="grid grid-cols-[50px_1fr] mt-4 space-y-2">
              <img src="{{ asset('assets/image/ikon/Symbol.svg') }}" alt="transaksi">
              <div>
                <p>VA Multibank & QRIS</p>
                <p>Kami menerima transaksi melalui Virtual Account
                  BNI, Mandiri, BRI, BJB, Permata, dan QRIS.</p>
              </div>
              <img src="{{ asset('assets/image/ikon/Symbol.svg') }}" alt="transaksi">
              <div>
                <p>VA Multibank & QRIS</p>
                <p>Kami menerima transaksi melalui Virtual Account
                  BNI, Mandiri, BRI, BJB, Permata, dan QRIS.</p>
              </div>
            </div>
        </div>
        <div>
          <img class="rounded-2xl" src="{{ asset('assets/image/gambar3beranda.jpg') }}" alt="gambar3">
        </div>
      </div>
    </section>

  <div class="bg-[#4285F4] h-100 mt-30">
    <div class="text-center pt-25">
      <p class="text-[#FFAA46] text-lg font-semibold">AJUKAN SEKARANG!</p>
      <h1 class="text-white text-5xl font-bold mt-5">Anda memiliki naskah yang <br>
        belum diterbitkan?</h1>
      <p class="text-white text-lg mt-3">Tunggu apa lagi? Segera ajukan naskah Anda!</p>
    </div>
    <div class="flex item-center justify-center mt-3">
      <a href="{{ url('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Ajukan Sekarang</a>
    </div>
  </div>

  <div>
    <h1 class="container mx-auto text-black h-15 pt-5 pl-10">© 2025 CRP. All Rights Reserved</h1>
  </div>


</body>
</html>