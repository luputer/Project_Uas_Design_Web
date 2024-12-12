<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPU Kabupaten - Pendaftaran Calon Anggota Legislatif</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-blue-700 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">KPU Kabupaten</h1>
            <p class="text-sm">Sistem Informasi Pendaftaran Calon Anggota Legislatif</p>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <section class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Selamat Datang di Portal Pendaftaran</h2>
            <p class="text-xl text-gray-600">Daftarkan diri Anda sebagai Calon Anggota Legislatif</p>
        </section>

        <!-- Carousel -->
        <div x-data="carousel()" class="relative mb-12 overflow-hidden rounded-lg">
            <div class="flex transition-transform duration-300 ease-in-out" :style="{ transform: `translateX(-${100 * currentIndex}%)` }">
                <div class="w-full flex-shrink-0">
                    <img src="https://via.placeholder.com/800x400?text=Slide+1" alt="Carousel Slide 1" class="w-full h-64 object-cover">
                </div>
                <div class="w-full flex-shrink-0">
                    <img src="https://via.placeholder.com/800x400?text=Slide+2" alt="Carousel Slide 2" class="w-full h-64 object-cover">
                </div>
                <div class="w-full flex-shrink-0">
                    <img src="https://via.placeholder.com/800x400?text=Slide+3" alt="Carousel Slide 3" class="w-full h-64 object-cover">
                </div>
            </div>
            <button @click="prev()" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-r">
                &lt;
            </button>
            <button @click="next()" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-l">
                &gt;
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $cards = [
                    ['icon' => 'user-plus', 'title' => 'Pendaftaran', 'description' => 'Mulai proses pendaftaran Anda sebagai calon anggota legislatif.', 'action' => 'Daftar Sekarang', 'route' => 'register'],
                    ['icon' => 'file-text', 'title' => 'Persyaratan', 'description' => 'Lihat daftar persyaratan yang diperlukan untuk mendaftar.', 'action' => 'Lihat Persyaratan', 'route' => 'requirements'],
                    ['icon' => 'check-circle', 'title' => 'Status Pendaftaran', 'description' => 'Periksa status pendaftaran Anda.', 'action' => 'Cek Status', 'route' => 'status'],
                    ['icon' => 'help-circle', 'title' => 'Bantuan', 'description' => 'Dapatkan bantuan dan informasi tambahan tentang proses pendaftaran.', 'action' => 'Pusat Bantuan', 'route' => 'help'],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $card['icon'] === 'user-plus' ? '18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z' : ($card['icon'] === 'file-text' ? '9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' : ($card['icon'] === 'check-circle' ? '9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : '8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z')) }}"></path>
                        </svg>
                        <h3 class="text-xl font-semibold">{{ $card['title'] }}</h3>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $card['description'] }}</p>
                    <a href="{{ route($card['route']) }}" class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        {{ $card['action'] }}
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Accordion -->
        <div x-data="{ activeAccordion: null }" class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Informasi Penting</h2>
            @php
                $accordionItems = [
                    ['title' => 'Jadwal Pendaftaran', 'content' => 'Pendaftaran calon anggota legislatif dibuka dari tanggal 1 Juli 2023 hingga 31 Juli 2023.'],
                    ['title' => 'Dokumen yang Diperlukan', 'content' => 'Dokumen yang diperlukan meliputi KTP, Ijazah terakhir, Surat Keterangan Sehat, dan Pas Foto terbaru.'],
                    ['title' => 'Proses Seleksi', 'content' => 'Proses seleksi meliputi verifikasi dokumen, tes tertulis, dan wawancara. Seleksi akan berlangsung selama bulan Agustus 2023.'],
                    ['title' => 'Pengumuman Hasil', 'content' => 'Hasil seleksi akan diumumkan pada tanggal 15 September 2023 melalui website resmi dan SMS kepada para kandidat.'],
                ];
            @endphp

            @foreach ($accordionItems as $index => $item)
                <div class="mb-2 border rounded-lg">
                    <button
                        @click="activeAccordion = (activeAccordion === {{ $index }}) ? null : {{ $index }}"
                        class="flex justify-between items-center w-full p-4 text-left bg-gray-200 hover:bg-gray-300 focus:outline-none"
                    >
                        <span class="font-semibold">{{ $item['title'] }}</span>
                        <svg
                            class="w-6 h-6 transition-transform duration-200"
                            :class="{ 'transform rotate-180': activeAccordion === {{ $index }} }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div
                        x-show="activeAccordion === {{ $index }}"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="p-4 bg-white"
                    >
                        <p>{{ $item['content'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-200 p-4 mt-12">
        <div class="container mx-auto text-center text-gray-600">
            <p>&copy; {{ date('Y') }} KPU Kabupaten. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        function carousel() {
            return {
                currentIndex: 0,
                items: [0, 1, 2],
                next() {
                    this.currentIndex = this.currentIndex === this.items.length - 1 ? 0 : this.currentIndex + 1;
                },
                prev() {
                    this.currentIndex = this.currentIndex === 0 ? this.items.length - 1 : this.currentIndex - 1;
                },
            }
        }
    </script>
</body>
</html>