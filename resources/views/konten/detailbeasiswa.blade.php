<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarfy</title>
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

    <div class="container max-w-screen relative mt-40">
        <div class="w-full px-4 -mt-12">
            <div class="max-w-xl mx-auto text-center mb-8">
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Detail Beasiswa</h2>
                <p class="font-medium text-md text-secondary md:text-lg mb-8">Cek Informasi Detail Beasiswa</p>
            </div>
        </div>
    </div>    
    
    <!-- cards detail beasiswa -->
    <div class="flex flex-col justify-center items-center h-[100vh] -mt-5 bg-slate-100">
          <?php $beasiswa = $beasiswa['data']; ?>

            <div class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
            <?php $i = 0; ?>    
                <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                      {{$beasiswa['namaBeasiswa']}}
                    </p>
                </div>
                <div class="mt-2 mb-8 w-full">
                    <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-white">
                    Deskripsi
                    </h4>
                    <p class="mt-2 px-2 text-base text-gray-600">
                    {{$beasiswa['deskripsi']}}
                    </p>
                </div> 
                <div class="grid grid-cols-2 gap-4 px-2 w-full">
                    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Semester Minimal</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                    {{$beasiswa['semMin']}}
                    </p>
                    </div>

                    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Semester Maksimal</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                    {{$beasiswa['semMax']}}
                    </p>
                    </div>

                    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Angkatan Awal</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                    {{$beasiswa['angkatanAwal']}}
                    </p>
                    </div>

                    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Angkatan Akhir</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                    {{$beasiswa['angkatanAkhir']}}
                    </p>
                    </div>

                    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Status</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                    {{$beasiswa['status']}}
                    </p>
                    </div>
                </div>
            </div>  
            <p class="font-normal text-navy-700 mt-20 mx-auto w-max">This data is provided by Kelompok 3</p>  
        </div>

<!-- Back to top Start -->
<a id="to-top" href="#home" class="fixed hidden items-center justify-center bottom-4 right-4 z-[9999] p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- Back to top End -->

    @vite('resources/js/app.js')

</body>
</html>