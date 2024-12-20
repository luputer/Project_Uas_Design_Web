<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }"
    class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di SIPCAL</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#06B6D4',
                        accent: '#F59E0B',
                        neutral: '#F3F4F6',
                        'base-100': '#FFFFFF',
                        'base-200': '#F9FAFB',
                        'base-300': '#F3F4F6',
                    }
                }
            }
        }

    </script>
</head>

<body x-bind:class="darkMode ? 'dark bg-gray-900 text-white' : 'bg-white text-gray-800'"
    class="font-sans transition-colors duration-300">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="w-full navbar bg-white shadow-sm dark:bg-gray-800">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="flex-1 px-2 mx-2 text-primary font-bold text-xl">Sicapil</div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        <li><a href="#beranda" class="hover:text-primary">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-primary">Tentang Kami</a></li>
                        <li><a href="#fasilitas" class="hover:text-primary">QNA</a></li>
                        <li><a href="#kontak" class="hover:text-primary">Kontak</a></li>
                    </ul>
                </div>
                <button class="btn btn-ghost btn-circle" @click="darkMode = !darkMode">
                    <svg x-show="!darkMode" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                    <svg x-show="darkMode" class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Main Content -->
            <main class="container mx-auto px-4 py-8 w-full">
                <!-- Hero Section -->
                <div class="hero min-h-[70vh]">
                    <div class="hero-content flex-col lg:flex-row-reverse gap-8">
                        <div class="flex-1 grid grid-cols-2 gap-4 max-w-xl w-96">
                            @if($personalBrandData->isEmpty())
                            <p>No images available.</p>
                            @else
                            @foreach($personalBrandData as $data)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $data->image) }}" alt="Image"
                                    class="rounded-lg shadow-2xl bg-cover w-full h-full object-cover" />
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="flex-1">
                            <div x-data="typewriter()" x-init="start()"
                                class="inline-block overflow-hidden whitespace-nowrap border-r-4 border-blue-700 pr-2">
                                <h1 class="text-5xl font-bold" x-text="text"></h1>
                            </div>
                            <p class="py-6">
                                Experience the power of modern analytics and project management in one place. Start
                                managing your projects more efficiently today.
                            </p>
                            <a href="/admin/login" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <section id="tentang" class="py-10 bg-white dark:bg-gray-800 rounded-lg shadow-sm my-8">
                    <div class="max-w-4xl mx-auto px-6">
                        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Tentang Kami</h2>
                        <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                            <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                                <p class="mb-6">
                                    Kami adalah mahasiswa semester 3 di Poliban yang memiliki hasrat besar terhadap dunia programming dan ngoding. Selain itu, kami juga suka mengeksplorasi berbagai teknologi baru dan tantangan yang ada di dunia IT. Kami percaya bahwa dengan belajar dan berkolaborasi, kita dapat menciptakan solusi inovatif yang berdampak positif bagi masyarakat.
                                </p>
                                <p class="mb-6">
                                    Dalam perjalanan akademik kami, kami sering berpartisipasi dalam berbagai proyek dan kegiatan yang membantu kami mengasah keterampilan teknis dan keterampilan kerja tim. Kami senang berbagi pengetahuan dan pengalaman dengan sesama, serta selalu berusaha untuk menjadi lebih baik setiap hari.
                                </p>
                                <p class="mb-6">
                                    Komitmen kami untuk belajar dan berkembang tidak hanya berhenti di dalam kelas. Kami aktif terlibat dalam komunitas pengembang dan mengikuti berbagai workshop serta seminar untuk tetap up-to-date dengan perkembangan teknologi terkini. Kami yakin bahwa masa depan ada di tangan mereka yang terus belajar dan tidak takut untuk berinovasi.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </section>

                <div class="flex items-center justify-evenly  ">
                    <!-- betjustify-between the grid of cards -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        @foreach($personalBrandData as $data)
                        <div class="card bg-base-100 shadow-xl w-full dark:text-white dark:bg-gray-700">
                            <div class="card-body">
                                <h2 class="card-title"> {{ $data->nama }}</h2>
                                <ul class="list-disc list-inside">
                                    <li class="m-1"><i class="fa fa-github" style="font-size:24px"></i><a
                                            target="_blank" href="{{ $data->github }}"
                                            class="ml-1">{{ $data->github }}</a></li>
                                    <li class="m-1"><i class="fa fa-chain-broken" style="font-size:24px"></i><a
                                            target="_blank" class="ml-1"
                                            href="{{ $data->linkPortfolio }}">{{ $data->linkPortfolio }}</a></li>
                                    <li class="m-1">{{ $data->goal }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <!-- Facilities Section -->
                <section id="fasilitas"
                    class="py-16 mt-10 bg-white dark:bg-gray-900 rounded-lg shadow-sm w-full mx-auto p-5">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">QNA</h2>
                    <div class="join join-vertical mx-auto w-full">
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" checked />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                kapan pertama kali ngoding dan kenapa suka ngoding ?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Jika dibilang suka mungkin tidak terlalu, tapi saya mulai tertarik sejak semester 1
                                    saat pertama kali mendapatkan kursus gratis dari <a
                                        href="https://www.dicoding.com/">Dicoding</a> dan Codepolitan. Itulah pertama
                                    kali saya mulai ngoding. Mulai dari HTML, CSS, dan JavaScript, hingga sekarang masih
                                    terus belajar ngoding, sampai ke REACT, NEXTJS, MERN, dan LARAVEL. Yang seru saat
                                    menemukan error yang lama dan ketemu bugnya. <br>
                                    <span class=" badge badge-md p-1 font-semibold text-dark  badge-primary">~BY
                                        Saidi</span> </p>
                                <p> Saya pertama kali ngoding karna kebetulan awalnya saya tidak diterima masuk di
                                    jurusan tkj smk, jadi terpaksa saya harus masuk ke pilihan ke3 yaitu RPL yang
                                    dimana, diharuskan ngoding terus. awalnya memang berat tapi sekarang tetap masih
                                    berat XIXIXIX <br>
                                    <span class=" badge badge-md p-1 font-semibold text-dark  badge-primary">~By
                                        Ari</span> </p>
                            </div>
                        </div>
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                Apakah ada framework atau teknologi baru yang ingin Anda pelajari dalam waktu dekat?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Framework yang baru ingin saya pelajari mungkin React dan framework-nya, Next.js,
                                    karena seru bisa membuat berbagai macam UI. Saya juga baru tahu kalau frontend itu
                                    banyak bermain dengan data dan logika. Selain itu, mungkin saya juga ingin belajar
                                    backend dengan Laravel, karena untuk membuat aplikasi yang cepat, Laravel adalah
                                    pilihan yang menarik dibandingkan framework lain. Selain itu, saya juga tertarik
                                    untuk mempelajari Python karena saya tertarik dengan AI dan Data Science.
                                    <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~BY
                                        Saidi</span>
                                </p>
                                <p> Mungkin saya ingin belajar React js , karena saya melihat React sangat keren dan
                                    multifungsi
                                    <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~By
                                        Ari</span>
                                </p>
                            </div>
                        </div>
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                Apa bahasa pemerograman yang paling di sukai dan kenapa ?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Bahasa pemrograman yang paling disukai saya kurang tahu pasti, tetapi karena sering
                                    menggunakan JavaScript, mungkin saya memilih JavaScript karena dapat digunakan di
                                    berbagai platform. <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~By
                                        Saidi</span></p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Project  --}}
                <center>
                    <section class="flex flex-col items-center">
                        <!-- Carousel Container -->
                        <div class="carousel relative w-full max-w-4xl max-h-96">
                            <!-- Slides -->
                            <div id="slide1" class="carousel-item relative w-full">
                                <img src="{{ asset('img/project1.png') }}" class="w-full object-cover rounded-lg" />
                                <div
                                    class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                    <a href="#slide4" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❮</a>
                                    <a href="#slide2" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❯</a>
                                </div>
                            </div>
                            <div id="slide2" class="carousel-item relative w-full">
                                <img src="{{ asset('img/project2.jpg') }}" class="w-full object-cover rounded-lg" />
                                <div
                                    class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                    <a href="#slide1" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❮</a>
                                    <a href="#slide3" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❯</a>
                                </div>
                            </div>
                            <div id="slide3" class="carousel-item relative w-full">

                                <img src="{{ asset('img/project3.jpg') }}" class="w-full object-cover rounded-lg" />
                                <div
                                    class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                    <a href="#slide2" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❮</a>
                                    <a href="#slide4" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❯</a>
                                </div>
                            </div>
                            <div id="slide4" class="carousel-item relative w-full">
                                <img src="{{ asset('img/project4.jpg') }}" class="w-full object-cover rounded-lg" />
                                <div
                                    class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                                    <a href="#slide3" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❮</a>
                                    <a href="#slide1" class="btn btn-circle bg-gray-800/70 hover:bg-gray-800">❯</a>
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnail Navigation -->
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#slide1" class="cursor-pointer">
                                <img src="{{ asset('img/project1.png') }}"
                                    class="w-20 h-12 object-cover rounded border border-gray-300 hover:ring-2 hover:ring-blue-500" />
                            </a>
                            <a href="#slide2" class="cursor-pointer">
                                <img src="{{ asset('img/project2.jpg') }}"
                                    class="w-20 h-12 object-cover rounded border border-gray-300 hover:ring-2 hover:ring-blue-500" />
                            </a>
                            <a href="#slide3" class="cursor-pointer">
                                <img src="{{ asset('img/project3.jpg') }}"
                                    class="w-20 h-12 object-cover rounded border border-gray-300 hover:ring-2 hover:ring-blue-500" />
                            </a>
                            <a href="#slide4" class="cursor-pointer">
                                <img src="{{ asset('img/project4.jpg') }}"
                                    class="w-20 h-12 object-cover rounded border border-gray-300 hover:ring-2 hover:ring-blue-500" />
                            </a>
                        </div>
                    </section>

                </center>
                <!-- Contact Section -->
                <section id="kontak" class="py-16">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Hubungi Kami</h2>
                    <div class="card bg-white dark:bg-gray-900 shadow-xl max-w-2xl mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @foreach($personalBrandData as $data)
                            <div class="card-body rounded-lg shadow-md p-6 dark:bg-gray-700">
                                <div class="space-y-4 text-gray-600 dark:text-gray-300">
                                    <p><strong class="text-gray-800 dark:text-white">Nama:</strong>
                                        {{ $data->nama }}
                                    </p>
                                    <p><strong class="text-gray-800 dark:text-white">Email:</strong>
                                        {{ $data->email }}
                                    </p>
                                    <p><strong class="text-gray-800 dark:text-white">phone:</strong>
                                        {{ $data->phone }}</p>
                                </div>
                                <div class="card-actions justify-end mt-6">
                                    <button class="btn btn-primary">Kirim Pesan</button>
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </section>
            </main>


            <!-- Footer -->
            <footer class="footer footer-center dark:bg-gray-800 p-10 bg-base-200 text-base-content rounded">
                <div class="grid grid-flow-col gap-4 dark:text-white">
                    <a class="link link-hover">About us</a>
                    <a class="link link-hover">Contact</a>
                    <a class="link link-hover">Jobs</a>
                    <a class="link link-hover">Press kit</a>
                </div>
                <div>
                    <div class="grid grid-flow-col gap-4 dark:text-white">
                        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                </path>
                            </svg></a>
                        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                                </path>
                            </svg></a>
                        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                                </path>
                            </svg></a>
                    </div>
                </div>
                <div>
                    <p class="">Copyright © 2023 - All rights reserved by ACME Industries Ltd</p>
                </div>
            </footer>

            <!-- Sidebar -->
            <div class="drawer-side">
                <label for="my-drawer-3" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 h-full bg-white dark:bg-gray-800">
                    <li><a href="#beranda" class="text-gray-700 hover:text-primary dark:text-white">Beranda</a></li>
                    <li><a href="#tentang" class="text-gray-700 hover:text-primary dark:text-white">Tentang Kami</a>
                    </li>
                    <li><a href="#program" class="text-gray-700 hover:text-primary dark:text-white">Program Unggulan</a>
                    </li>
                    <li><a href="#fasilitas" class="text-gray-700 hover:text-primary dark:text-white">Fasilitas</a></li>
                    <li><a href="#kontak" class="text-gray-700 hover:text-primary dark:text-white">Kontak</a></li>
                </ul>
            </div>
</body>
<script>
    function typewriter() {
        return {
            text: '',
            texts: [
                'Welcome to our website 👋👋👋 ',
                'Enjoy the experience 🗿'
            ],
            delay: 100,
            deleteDelay: 100,
            textIndex: 0,
            start() {
                this.type();
            },
            type() {
                let currentIndex = 0;
                const interval = setInterval(() => {
                    this.text = this.texts[this.textIndex].slice(0, currentIndex + 1);
                    currentIndex++;

                    if (currentIndex === this.texts[this.textIndex].length) {
                        clearInterval(interval);
                        setTimeout(() => this.delete(), 2000); // Wait before deleting
                    }
                }, this.delay);
            },
            delete() {
                let currentIndex = this.texts[this.textIndex].length;
                const interval = setInterval(() => {
                    this.text = this.texts[this.textIndex].slice(0, currentIndex - 1);
                    currentIndex--;

                    if (currentIndex === 0) {
                        clearInterval(interval);
                        this.textIndex = (this.textIndex + 1) % this.texts.length; // Move to next text
                        setTimeout(() => this.type(), 500); // Wait before typing again
                    }
                }, this.deleteDelay);
            }
        }
    }

</script>

</html>
