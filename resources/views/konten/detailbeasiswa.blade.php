<?php $beasiswa = $beasiswa['data']; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarfy | {{ $beasiswa['namaBeasiswa'] }}</title>
    <link rel="stylesheet" href="dist/output.css">
    @vite('resources/css/app.css')

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
        } else {
        document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body>

    @include('layout.header')

    <!-- BLog Section Start -->
    <section id="blog" class="pt-36 pb-32 bg-slate-100 dark:bg-dark">
        <div class="container">
            <?php $i = 0; ?>    
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Penjelasan Lengkap</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">{{ $beasiswa['namaBeasiswa'] }}</h2>
                    {{-- <p class="font-medium text-md text-secondary md:text-lg">Lihat Penjelasan Lengkap mengenai Bea</p> --}}
                </div>
            </div>

            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full px-4 mb-10 lg:w-1/3">
                        <div class="w-full flex mb-3">
                            <a href="javascript:history.back()" class="inline-flex justify-center text-base shadow-md font-medium bg-white text-primary text-md dark:bg-slate-800 dark:shadow-2xl py-2 px-4 rounded-3xl hover:opacity-80 hover:shadow-lg transition duration-500">⬅️ Kembali</a>
                        </div>
                        <div class="rounded-md shadow-md overflow-hidden">
                            <img src="{{ $beasiswa['image'] }}" width="w-full" alt="{{ $beasiswa['namaBeasiswa'] }}">
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="bg-white p-4 rounded-b-md -mt-2 shadow-md dark:bg-slate-800">
                                <p class="text-sm text-gray-600 dark:text-white">Semester Minimal: <span class="text-base font-medium text-navy-700 dark:text-primary">{{ $beasiswa['semMin'] }}</span></p>
                                <p class="text-sm text-gray-600 dark:text-white">Semester Maksimal: <span class="text-base font-medium text-navy-700 dark:text-primary">{{ $beasiswa['semMax'] }}</span></p>
                                <p class="text-sm text-gray-600 dark:text-white">IPK Minimal: <span class="text-base font-medium text-navy-700 dark:text-primary">{{ $beasiswa['ipkMin'] }}</span></p>
                                <p class="text-sm text-gray-600 dark:text-white">Status: <span class="text-base font-medium text-navy-700 dark:text-primary">{{ $beasiswa['status'] }}</span></p>
                            </div>
                          </div>
                      </div>
                    <div class="w-full px-4 mb-10 lg:w-2/3">
                        <h3 class="font-semibold text-dark text-xl mb-4 lg:text-2xl lg:pt-10 dark:text-white">Deskripsi</h3>
                        <span class="font-medium text-base text-secondary mb-3 lg:text-lg text-justify">{!! $beasiswa['deskripsi'] !!} </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLog Section End -->

    @include('layout.footer')

    <!-- Back to top Start -->
    <a id="to-top" href="#home" class="fixed hidden items-center justify-center bottom-4 right-4 z-[9999] p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- Back to top End -->

    @vite('resources/js/app.js')
</body>
</html>