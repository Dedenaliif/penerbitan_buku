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
           <li><a href="{{ url('marketplace') }}" class="hover:underline" target="_blank">Toko Buku</a></li>
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
