<aside class="w-1/4 pr-6">
    <div class="bg-white border rounded-lg p-6 shadow-md">
      <ul class="space-y-4 text-gray-700 text-sm font-medium">
        <li>
          <a href="{{ url('dashboard') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('dashboard') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
            <!-- Icon Dashboard -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 10h4v11H3V10zM10 3h4v18h-4V3zM17 14h4v7h-4v-7z" />
            </svg>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ url('naskah-buku') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('naskah-buku') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
            <!-- Icon Book -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6l4 2m4 2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2z" />
            </svg>
            <span>Naskah Buku</span>
          </a>
        </li>
        <li>
          <a href="{{ url('daftar-alamat') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('daftar-alamat') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
            <!-- Icon Location -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 11c1.38 0 2.5-1.12 2.5-2.5S13.38 6 12 6 9.5 7.12 9.5 8.5 10.62 11 12 11z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z" />
            </svg>
            <span>Daftar Alamat</span>
          </a>
        </li>
        <li>
          <a href="{{ route('password.change.form') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('ubah-password') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
            <!-- Icon Key -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12H9m-3 6v-6m0 0a6 6 0 1112 0 6 6 0 01-12 0z" />
            </svg>
            <span>Ubah Sandi</span>
          </a>
        </li>
        <li>
          <a href="{{ url('logout') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-red-600 hover:bg-red-100 hover:text-red-800">
            <!-- Icon Logout -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7" />
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 16v1a2 2 0 002 2h3m4-5v-1a2 2 0 00-2-2h-3" />
            </svg>
            <span>Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>