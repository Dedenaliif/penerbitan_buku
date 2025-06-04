<aside class="w-1/4 pr-6">
    <div class="bg-white border rounded-lg p-6 shadow-md">
      <ul class="space-y-4 text-gray-700 text-sm font-medium">
        <li>
          <a href="{{ url('review-naskah') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('review-naskah') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
            <!-- Icon Book -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6l4 2m4 2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2z" />
            </svg>
            <span>Review Naskah</span>
          </a>
        </li>
        <li>
          <a href="{{ url('verifikasi-pembayaran') }}"
             class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                    hover:bg-purple-50 hover:text-purple-600
                    {{ request()->is('verifikasi-pembayaran') ? 'bg-purple-100 text-purple-600 font-semibold' : '' }}">
              <!-- Icon Uang (Currency Dollar) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8c-2.28 0-4 .895-4 2s1.72 2 4 2 4 .895 4 2-1.72 2-4 2m0-10v2m0 8v2" />
            </svg>
            <span>Verifikasi Pembayaran</span>
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