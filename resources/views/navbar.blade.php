<!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-[#1f2532] shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24">
                <a href="#">
                    <img src="/images/mardizu.png" alt="Mardizu Logo" class="h-14 w-auto" />
                </a>

                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-300 focus:outline-none" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    </button>
                </div>

                <div class="hidden md:flex space-x-10 text-gray-300 font-semibold items-center text-lg select-none">
                    <a href="#" class="hover:text-indigo-400 transition">Beranda</a>

                    <div class="relative group">
                    <button
                        class="flex items-center hover:text-indigo-400 transition focus:outline-none select-none cursor-pointer">
                        Daftar & Lengkapi
                        <svg class="ml-1 w-4 h-4 text-gray-300 group-hover:text-indigo-400 transition" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div
                        class="absolute right-0 mt-1 w-48 bg-gray-700 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200 z-50 pointer-events-auto">
                        <a href="#"
                        class="block px-4 py-2 text-sm text-gray-200 hover:bg-indigo-600 rounded-md transition">Daftar Member</a>
                        <a href="#"
                        class="block px-4 py-2 text-sm text-gray-200 hover:bg-indigo-600 rounded-md transition">Form Penempatan</a>
                    </div>
                </div>

                    <a href="#" class="hover:text-indigo-400 transition">Berita</a>
                    <a href="#" class="hover:text-indigo-400 transition">Galeri</a>
                    <a href="#" class="hover:text-indigo-400 transition">Diskusi & Ulasan</a>
                    <a href="#" class="hover:text-indigo-400 transition">F.A.Q</a>
                    <a href="#" class="hover:text-indigo-400 transition">Contact</a>
                </div>
            </div>

            <div id="menu" class="md:hidden hidden flex-col space-y-4 py-4 text-gray-300 font-semibold">
            <a href="#" class="block hover:text-indigo-400 transition">Beranda</a>

            <div>
                <button id="submenu-toggle"
                class="w-full text-left font-semibold flex items-center justify-between hover:text-indigo-400 focus:outline-none cursor-pointer select-none">
                Daftar & Lengkapi
                <svg class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
                <div id="submenu" class="mt-2 hidden space-y-2 pl-4 flex-col">
                <a href="#" class="text-sm text-gray-200 hover:text-indigo-400 transition">Daftar Member</a>
                <a href="#" class="text-sm text-gray-200 hover:text-indigo-400 transition">Form Penempatan</a>
                </div>
            </div>

            <a href="#" class="block hover:text-indigo-400 transition">Berita</a>
            <a href="#" class="block hover:text-indigo-400 transition">Galeri</a>
            <a href="#" class="block hover:text-indigo-400 transition">Diskusi & Ulasan</a>
            <a href="#" class="block hover:text-indigo-400 transition">F.A.Q</a>
            <a href="#" class="block hover:text-indigo-400 transition">Contact</a>
            </div>
        </div>
    </nav>

    <div 
        class="h-56 bg-gradient-to-r from-blue-500 to-cyan-400 w-full relative z-0">
    </div>


<script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('menu').classList.toggle('hidden');
    });

    document.getElementById('submenu-toggle').addEventListener('click', () => {
        const submenu = document.getElementById('submenu');
        submenu.classList.toggle('hidden');

        const svg = document.querySelector('#submenu-toggle svg');
        if (submenu.classList.contains('hidden')) {
        svg.style.transform = 'rotate(0deg)';
        } else {
        svg.style.transform = 'rotate(180deg)';
        }
    });
</script>
