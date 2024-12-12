<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" 
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di SIPCAL</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div> 
                <div class="flex-1 px-2 mx-2 text-primary font-bold text-xl">SIPCAL</div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        <li><a href="#beranda" class="hover:text-primary">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-primary">Tentang Kami</a></li>
                        <li><a href="#program" class="hover:text-primary">Program Unggulan</a></li>
                        <li><a href="#fasilitas" class="hover:text-primary">Fasilitas</a></li>
                        <li><a href="#kontak" class="hover:text-primary">Kontak</a></li>
                    </ul>
                </div>
                <button class="btn btn-ghost btn-circle" @click="darkMode = !darkMode">
                    <svg x-show="!darkMode" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
            </div>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8 w-full">
    <!-- Hero Section -->
    <div class="hero min-h-[70vh] bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse gap-8">
            <div class="flex-1 grid grid-cols-2 gap-4 max-w-xl w-96">  
                @if($personalBrandData->isEmpty())  
                    <p>No images available.</p>  
                @else  
                    @foreach($personalBrandData as $data)  
                        <div class="relative">  
                            <img src="{{ asset('storage/' . $data->image) }}" alt="Image" class="rounded-lg shadow-2xl bg-cover w-full h-full object-cover" />  
                        </div>  
                    @endforeach  
                @endif  
            </div>
            <div class="flex-1">
                <h1 class="text-5xl font-bold">Welcome to Your Dashboard!</h1>
                <p class="py-6">
                    Experience the power of modern analytics and project management in one place. Start managing your projects more efficiently today.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="tentang" class="py-16 bg-white dark:bg-gray-800 rounded-lg shadow-sm my-8">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Tentang Kami</h2>
            <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                <p class="mb-6">
                    Sekolah Kita adalah lembaga pendidikan yang berdedikasi untuk mengembangkan potensi setiap siswa. Dengan kurikulum yang komprehensif dan fasilitas modern, kami berkomitmen untuk menciptakan lingkungan belajar yang inspiratif dan inovatif.
                </p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Didirikan sejak tahun 1990</li>
                    <li>Akreditasi A</li>
                    <li>Lebih dari 500 alumni sukses</li>
                    <li>Staf pengajar berkualifikasi tinggi</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="program" class="py-16" x-data="{ activeSlide: 1 }">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Program Unggulan</h2>
        <div class="carousel w-full mx-auto">
            <template x-for="(slide, index) in [
                {title: 'Program Bilingual', desc: 'Meningkatkan kemampuan bahasa Inggris siswa melalui pembelajaran bilingual.'},
                {title: 'Kelas Sains dan Teknologi', desc: 'Mempersiapkan siswa untuk era digital dengan fokus pada sains dan teknologi terkini.'},
                {title: 'Program Kepemimpinan', desc: 'Mengembangkan soft skills dan jiwa kepemimpinan siswa melalui berbagai kegiatan.'},
                {title: 'Ekstrakurikuler Beragam', desc: 'Menyediakan berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.'}
            ]" :key="index">
                <div class="carousel-item w-full max-w-7xl mx-auto" x-show="activeSlide === index + 1">
                    <div class="card bg-blue-50 dark:bg-gray-700 shadow-lg mx-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary dark:text-white" x-text="slide.title"></h3>
                            <p class="text-gray-600 dark:text-gray-300" x-text="slide.desc"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="flex justify-center w-full py-4 gap-2">
            <template x-for="i in 4" :key="i">
                <button 
                    class="btn btn-xs" 
                    :class="activeSlide === i ? 'btn-primary' : 'btn-ghost'" 
                    @click="activeSlide = i" 
                    x-text="i">
                </button>
            </template>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="fasilitas" class="py-16 bg-white dark:bg-gray-800 rounded-lg shadow-sm w-full mx-auto p-5">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Fasilitas</h2>
        <div class="join join-vertical mx-auto w-full">
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700">
                <input type="radio" name="facilities" checked /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Perpustakaan Digital
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Akses ke ribuan buku dan sumber belajar digital.</p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700">
                <input type="radio" name="facilities" /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Laboratorium Sains
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Fasilitas lengkap untuk eksperimen dan penelitian ilmiah.</p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700">
                <input type="radio" name="facilities" /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Lapangan Olahraga
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Area luas untuk berbagai aktivitas olahraga dan kegiatan outdoor.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-16">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Hubungi Kami</h2>
        <div class="card bg-white dark:bg-gray-700 shadow-xl max-w-2xl mx-auto">
            <div class="card-body">
                <div class="space-y-4 text-gray-600 dark:text-gray-300">
                    <p><strong class="text-gray-800 dark:text-white">Alamat:</strong> Jl. Pendidikan No. 123, Kota Sejahtera</p>
                    <p><strong class="text-gray-800 dark:text-white">Telepon:</strong> (021) 1234-5678</p>
                    <p><strong class="text-gray-800 dark:text-white">Email:</strong> info@sekolahkita.edu</p>
                    <p><strong class="text-gray-800 dark:text-white">Jam Operasional:</strong> Senin - Jumat, 07.00 - 16.00 WIB</p>
                </div>
                <div class="card-actions justify-end mt-6">
                    <button class="btn btn-primary">Kirim Pesan</button>
                </div>
            </div>
        </div>
    </section>
</main>


            <!-- Footer -->
            <footer class="footer p-10 bg-gray-50 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                <div>
                    <span class="footer-title text-primary">Sekolah Kita</span> 
                    <p>&copy; 2023 Sekolah Kita. Hak Cipta Dilindungi.</p>
                    <p>Dibuat dengan ❤️ untuk pendidikan berkualitas</p>
                </div> 
                <div>
                    <span class="footer-title text-primary">Social Media</span> 
                    <div class="grid grid-flow-col gap-4">
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                        </a>
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg>
                        </a>
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg>
                        </a>
                    </div>
                </div>
            </footer>
        </div> 

        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label> 
            <ul class="menu p-4 w-80 h-full bg-white dark:bg-gray-800">
                <li><a href="#beranda" class="text-gray-700 hover:text-primary dark:text-white">Beranda</a></li>
                <li><a href="#tentang" class="text-gray-700 hover:text-primary dark:text-white">Tentang Kami</a></li>
                <li><a href="#program" class="text-gray-700 hover:text-primary dark:text-white">Program Unggulan</a></li>
                <li><a href="#fasilitas" class="text-gray-700 hover:text-primary dark:text-white">Fasilitas</a></li>
                <li><a href="#kontak" class="text-gray-700 hover:text-primary dark:text-white">Kontak</a></li>
            </ul>
        </div>
    </div>
    <!DOCTYPE html>
<html lang="en" x-data="{ 
    darkMode: localStorage.getItem('darkMode') === 'true',
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
    }
}" :data-theme="darkMode ? 'dark' : 'light'">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-base-100 transition-colors duration-200">
    <!-- Navbar Section -->
    <div class="navbar bg-base-100 shadow-lg sticky top-0 z-50" x-data="{ isOpen: false }">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden" @click="isOpen = !isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52"
                    x-show="isOpen" @click.away="isOpen = false">
                    <li><a class="active">Dashboard</a></li>
                    <li><a>Projects</a></li>
                    <li><a>Team</a></li>
                    <li><a>Settings</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost normal-case text-xl">DashApp</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a class="active">Dashboard</a></li>
                <li><a>Projects</a></li>
                <li><a>Team</a></li>
                <li><a>Settings</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <label class="swap swap-rotate btn btn-ghost btn-circle" @click="toggleDarkMode()">
                <input type="checkbox" :checked="darkMode"/>
                <svg class="swap-on fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
                </svg>
                <svg class="swap-off fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
                </svg>
            </label>
        </div>
    </div>

    <!-- Hero Section with Two Images -->
    <div class="hero min-h-[70vh] bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse gap-8">
            <div class="flex-1 grid grid-cols-2 gap-4 max-w-xl">
                <img src="https://placehold.co/600x400/png" class="rounded-lg shadow-2xl" alt="Dashboard Preview 1"/>
                <img src="https://placehold.co/600x400/png" class="rounded-lg shadow-2xl" alt="Dashboard Preview 2"/>
            </div>
            <div class="flex-1">
                <h1 class="text-5xl font-bold">Welcome to Your Dashboard!</h1>
                <p class="py-6">Experience the power of modern analytics and project management in one place. Start managing your projects more efficiently today.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <main class="container mx-auto px-4 py-8">
        <!-- Accordion Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Frequently Asked Questions</h2>
            <div class="join join-vertical w-full" x-data="{ activeAccordion: 1 }">
                <div class="collapse collapse-arrow join-item border border-base-300">
                    <input type="radio" name="accordion-1" checked @click="activeAccordion = 1" :checked="activeAccordion === 1"/> 
                    <div class="collapse-title text-xl font-medium">
                        How do I get started?
                    </div>
                    <div class="collapse-content"> 
                        <p>Getting started is easy! Simply click the "Get Started" button above and follow the guided tutorial.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow join-item border border-base-300">
                    <input type="radio" name="accordion-1" @click="activeAccordion = 2" :checked="activeAccordion === 2"/> 
                    <div class="collapse-title text-xl font-medium">
                        What features are included?
                    </div>
                    <div class="collapse-content"> 
                        <p>Our platform includes project management, team collaboration, task tracking, and detailed analytics.</p>
                    </div>
                </div>
                <div class="collapse collapse-arrow join-item border border-base-300">
                    <input type="radio" name="accordion-1" @click="activeAccordion = 3" :checked="activeAccordion === 3"/> 
                    <div class="collapse-title text-xl font-medium">
                        How can I contact support?
                    </div>
                    <div class="collapse-content"> 
                        <p>Our support team is available 24/7 through chat, email, or phone. Click the support icon in the bottom right corner.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="mb-8" x-data="{ activeSlide: 1 }">
            <h2 class="text-2xl font-bold mb-4">Featured Projects</h2>
            <div class="carousel w-full rounded-box">
                <div id="slide1" class="carousel-item relative w-full" :class="{ 'hidden': activeSlide !== 1 }">
                    <img src="https://placehold.co/1200x400/png" class="w-full object-cover" alt="Project Alpha"/>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">
                            <h3 class="text-3xl font-bold">Project Alpha</h3>
                            <p class="py-6">Revolutionary mobile app development project with cutting-edge features.</p>
                        </div>
                    </div>
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <button class="btn btn-circle" @click="activeSlide = 3">❮</button> 
                        <button class="btn btn-circle" @click="activeSlide = 2">❯</button>
                    </div>
                </div> 
                <div id="slide2" class="carousel-item relative w-full" :class="{ 'hidden': activeSlide !== 2 }">
                    <img src="https://placehold.co/1200x400/png" class="w-full object-cover" alt="Project Beta"/>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">
                            <h3 class="text-3xl font-bold">Project Beta</h3>
                            <p class="py-6">Enterprise-level cloud solution for seamless data management.</p>
                        </div>
                    </div>
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <button class="btn btn-circle" @click="activeSlide = 1">❮</button> 
                        <button class="btn btn-circle" @click="activeSlide = 3">❯</button>
                    </div>
                </div> 
                <div id="slide3" class="carousel-item relative w-full" :class="{ 'hidden': activeSlide !== 3 }">
                    <img src="https://placehold.co/1200x400/png" class="w-full object-cover" alt="Project Gamma"/>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">
                            <h3 class="text-3xl font-bold">Project Gamma</h3>
                            <p class="py-6">AI-powered analytics platform for business intelligence.</p>
                        </div>
                    </div>
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <button class="btn btn-circle" @click="activeSlide = 2">❮</button> 
                        <button class="btn btn-circle" @click="activeSlide = 1">❯</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Latest Updates</h2>
                    <ul class="list-disc list-inside">
                        <li>New feature release v2.1.0</li>
                        <li>Performance improvements</li>
                        <li>Bug fixes and optimizations</li>
                    </ul>
                </div>
            </div>
            
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Team Activity</h2>
                    <ul class="list-disc list-inside">
                        <li>John completed Project Alpha</li>
                        <li>Sarah joined Team Beta</li>
                        <li>New milestone achieved</li>
                    </ul>
                </div>
            </div>
            
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Upcoming Events</h2>
                    <ul class="list-disc list-inside">
                        <li>Team Meeting - Monday 10 AM</li>
                        <li>Project Review - Wednesday 2 PM</li>
                        <li>Training Session - Friday 11 AM</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
        <div class="grid grid-flow-col gap-4">
            <a class="link link-hover">About us</a> 
            <a class="link link-hover">Contact</a> 
            <a class="link link-hover">Jobs</a> 
            <a class="link link-hover">Press kit</a>
        </div> 
        <div>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
            </div>
        </div> 
        <div>
            <p>Copyright © 2023 - All rights reserved by ACME Industries Ltd</p>
        </div>
    </footer>
</body>
</html>
</body>
</html>
