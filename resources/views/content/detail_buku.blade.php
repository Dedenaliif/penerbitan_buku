
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deatail Buku - CRP Press</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
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
                    <form action="{{ url('detail_buku_get') }}" method="GET">
                        @csrf
                        <input type="text" placeholder="Cari ..." class="w-full max-w-md px-4 py-2 rounded-md text-black bg-white border border-white focus:outline-none" />
                    </form>
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

                  @push('scripts')
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
                  @endpush
    </section>

    <main class="container mx-auto px-4 py-12 flex  gap-12">
        <!-- Gambar Buku -->
        <div class="w-full lg:w-1/3 flex justify-center">
            <img class="bg-cover" src="{{ asset('assets/image/coverbuku.svg') }}" alt="Cover Senja Bersama Ayah" class="w-[300px] rounded-lg shadow-lg">
        </div>

        <!-- Detail Buku -->
        <div class="">
            <h1 class="text-3xl font-bold">Senja Bersama Ayah</h1>
            <p class="text-[#4285F4] font-medium">
                Rahayu Putri A, Dimas Yuliantara, Nabila Farah
            </p>

            <!-- Rating dan Stok -->
            <div class="flex items-center gap-4">
                <div class="text-yellow-400 flex space-x-1 text-lg">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span class="text-gray-300">★</span>
                </div>
                <p class="text-green-600 font-semibold">In Stock</p>
            </div>

            <!-- Tabs -->
            <div>
                <div>
                    <hr>
                </div>
                    <nav class="flex space-x-8" aria-label="Tabs">
                        <span class="text-black font-semibold  pb-2">Deskripsi</span>
                    </nav>
                <div>
                    <hr>
                </div>

                <!-- Detail Metadata -->
                <div class="mt-6 text-sm text-gray-700 space-y-2">
                    <p><span class="font-semibold">ISBN :</span> 978-623-00-1234-5</p>
                    <p><span class="font-semibold">Kategori :</span> <span class="text-[#4285F4]">Fiksi</span>, <span class="text-[#4285F4]">Keluarga</span>, <span class="text-[#4285F4]">Cerita Anak</span></p>
                    <p><span class="font-semibold">Tahun Terbit :</span> 2025</p>
                    <p><span class="font-semibold">Penerbit :</span> CRP Press</p>
                    <p><span class="font-semibold">Bahasa :</span> <span class="text-[#4285F4]">Indonesia</span></p>
                </div>

                <!-- Deskripsi Buku -->
                <div class="mt-6 text-sm text-gray-800 leading-relaxed">
                    <p class="whitespace-normal"><strong>"Senja Bersama Ayah"</strong> adalah kisah menyentuh tentang hubungan antara seorang ayah dan <br>putrinya yang dipenuhi kehangatan, pelajaran hidup, dan momen-momen kecil yang berarti. <br>Dalam buku ini, pembaca diajak menyusuri senja di pinggir danau, tempat favorit sang ayah dan <br>anaknya berbagi cerita, impian, dan kenangan.
                        Melalui ilustrasi lembut dan narasi yang mengalir,<br> buku ini menggambarkan nilai pentingnya kehadiran orang tua dalam masa tumbuh kembang anak. <br>Setiap bab menghadirkan potongan kehidupan yang sederhana namun penuh makna, seperti <br>belajar bersepeda, membaca buku bersama, hingga mengenang ibu yang telah tiada.
                        Buku ini <br>cocok dibaca oleh semua kalangan usia, terutama bagi mereka yang ingin merasakan kembali <br>hangatnya pelukan kasih sayang seorang ayah saat senja mulai meredup.
                        </p>
                    <p>( Ukuran 21,5 cm x 21,5 cm (Kotak), 120 halaman warna semua.)</p>
                </div>
            </div>
                    <!-- Penulis -->
            <section class="mt-4 ">
                <h2 class="text-base font-semibold text-gray-800 border-y pb-2 mb-4">Penulis</h2>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                        <span class="text-sm text-[#4285F4] hover:underline">Rahayu Putri A</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                        <span class="text-sm text-[#4285F4] hover:underline">Dimas Yuliantara</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                        <span class="text-sm text-[#4285F4] hover:underline">Nabila Farah</span>
                    </li>
                </ul>
            </section>
        </div>

        <!-- Sidebar Beli Buku -->
        <div class="bg-white border p-6 shadow-xl rounded-xl h-60 max-w-xs">
            <p class="text-sm text-gray-500 mb-2">Beli buku ini?</p>
            <p class="text-lg font-semibold mb-4">Subtotal: <span class="text-black">Rp. 250.000</span></p>
            <button class="w-full bg-[#4285F4] text-white py-2 px-4 rounded-lg hover:bg-blue-500 mb-2">🛒 add to cart</button>
            <button class="w-full border border-[#4285F4] text-[#4285F4] py-2 px-4 rounded-lg hover:bg-blue-50">Wishlist</button>
        </div>
    </main>

    <div class="bg-blue-300 mt-20">
        <div class="container mx-auto pt-5 pb-10">
            <h3>Toko Buku CRP Press</h3>
            <p>CRP Press adalah penerbit akademis dan budaya yang berfokus pada penyebaran ilmu pengetahuan, pendidikan, dan karya sastra bermutu. Berdiri sebagai bagian dari ekosistem literasi Indonesia, CRP Press telah menerbitkan berbagai buku untuk mendukung perkembangan akademik, kreativitas, dan pemikiran kritis sejak awal pendiriannya.
                Seiring berkembangnya waktu, CRP Press kini menjadi salah satu penerbit yang dipercaya oleh para akademisi, peneliti, dan penulis kreatif dari berbagai kalangan, terutama dari lingkungan pendidikan tinggi. Buku-buku yang diterbitkan mencakup topik mulai dari ilmu sosial, sains, pendidikan, hingga fiksi dan sastra anak.
                Beberapa penulis yang telah bekerja sama dengan CRP Press di antaranya:
             </p>
             <p class="my-4">Rahayu Putri A, Dimas Yuliantara, Nabila Farah, Dina Ayu Pratama, Hanif Ramadhan</p>
             <p>Harga tiap produk belum termasuk biaya transaksi pembayaran, ongkos kirim, dan pajak 11%. Produk yang dibeli di Toko Buku CRP Press akan dikirimkan di hari yang sama apabila pemesanan dilakukan sebelum pukul 14:30 WIB. Pemesanan setelah waktu tersebut akan diproses dan dikirimkan pada hari kerja berikutnya.</p>
             <p>Selain menjual buku, CRP Press juga membuka peluang bagi Anda yang memiliki naskah orisinal — baik fiksi, ilmiah, maupun pendidikan — untuk diterbitkan secara profesional bersama kami. Kami menyediakan layanan editorial, desain, hingga distribusi.
                Untuk informasi lebih lanjut dan konsultasi penerbitan, silakan hubungi tim CRP Press melalui kanal resmi kami.</p>
        </div>
    </div>

</body>
</html>