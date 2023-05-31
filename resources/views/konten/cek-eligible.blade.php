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
    <!-- Header Start -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#home" class="font-bold text-lg text-primary block py-6">Scholarfy</a>
                </div>
                <div class="flex items-center">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-dark lg:dark:bg-transparent dark:shadow-slate-800">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Cek Eligible</a>
                            </li>
                            <li class="mt-3 flex items-center pl-8 lg:mt-0">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">Light</span>
                                    <input type="checkbox" name="dark-toggle" id="dark-toggle" class="hidden">
                                    <label for="dark-toggle">
                                        <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div class="toggle-circle h-4 w-4 rounded-full bg-white"></div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-slate-500">Dark</span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Intro Section Start -->
    <section id="about" class="pt-36 pb-32 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-bold uppercase text-primary text-lg mb-3">Cek Eligble</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">Lihat Beasiswa yang Eligible untuk Kamu!</h2>
                    <p class="font-medium text-base text-secondary max-w-xl lg:tx-lg">Masukkan NIM ke dalam form untuk memeriksa status eligble kamu</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section End -->

    <!-- Portfolio Section Start -->
    <section id="portfolio" class="pb-[220px] dark:bg-dark">
        <div class="container">
            <form method="POST" action="/cek-eligible">
                @csrf
            <div class="flex items-center justify-center">
                <div class="max-w-md mx-auto">
                <div class="flex">
                    <input type="text" id="nim" name="nim" class="border border-slate-500 rounded-l-lg w-full text-dark p-3 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" placeholder="Masukkan NIM kamu..."/>
                    <button type="submit" class="bg-primary hover:opacity-70 hover:bg-primary text-white font-medium rounded-r-lg px-8 py-2">Cek</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </section>

<!-- Portfolio Section Start -->
@if(isset($bs) && isset($mhs))
    
    <section id="portfolio" class="pb-16 dark:bg-slate-800">
        <div class="container max-w-screen relative mt-8">
            <div class="w-full px-4 -mt-12">
                <div class="max-w-xl mx-auto text-center mb-8 ">
                    <h4 class="font-semibold text-lg text-primary mb-2">Beasiswa</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Beasiswa Eligible</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">Berikut adalah Beasiswa Eligible untuk Kamu</p>
                </div>
            </div>
            
            @if($mhs['data']['relationship']['status'] == "Aktif")
            <?php 
                $success = $mhs['data']['relationship']['status'];
                $i=0; 
            ?>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @while(isset($bs['data'][$i]))
                    @if($mhs['data']['relationship']['semester_terdaftar'] > $bs['data'][$i]['semMin'] && $mhs['data']['relationship']['semester_terdaftar'] < $bs['data'][$i]['semMax'])
                        <div class="mb-12 p-4 md:w-1/2">
                            <div class="rounded-t-md shadow-md overflow-hidden bg-white ">
                                <img  src="https://img.freepik.com/premium-vector/3d-hand-throwing-graduation-hats-air_169241-7265.jpg" alt="Programming" class="w-full">
                                <div class="py-8 px-6">
                                    <h3>
                                    <a href="{{url('/posts/detailbeasiswa/'.$bs['data'][$i]['idBeasiswa'])}}" class="block mb-3 font-semibold text-lg text-dark hover:text-primary truncate dark:text-white">{{$bs['data'][$i]['namaBeasiswa']}}</a>
                                    </h3>
                                    <p class="font-medium text-base text-secondary mb-6">{{$bs['data'][$i]['deskripsi']}}</p>
                                    <a href="{{url('/posts/detailbeasiswa/'.$bs['data'][$i]['idBeasiswa'])}}" class="font-medium text-sm text-primary hover:opacity-80 flex justify-end text-right">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <?php $i++; ?>
                @endwhile
            @else
                <?php $error = $mhs['data']['relationship']['status']; ?>
            </div>
            @endif
        </div>
    </section>
@endif

   {{-- Alert --}}
   @if (isset($error))
   <div id="myAlert" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
       <div class="bg-white w-1/3 p-6 rounded-xl shadow-xl border border-slate-200">
           <p class="text-xl font-bold mb-4">❌ Gagal</p>
           <p id="alertMessage" class="text-gray-700 mb-10">Mohon maaf status kamu, {{ $error }}</p>
           <div class="flex items-center justify-center">
               <button id="closeAlert" class="bg-primary hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Close</button>
           </div>
       </div>
   </div>
   @endif
   @if (isset($success))
   <div id="myAlert" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
       <div class="bg-white w-1/3 p-6 rounded-xl shadow-xl border border-slate-200">
           <p class="text-xl font-bold mb-4">✅ Berhasil</p>
           <p id="alertMessage" class="text-gray-700 mb-10">Selamat {{ $mhs['data']['attributes']['nama'] }}. Silakan lihat beasiswa yang eligible untuk Kamu</p>
           <div class="flex items-center justify-center">
               <button id="closeAlert" class="bg-primary hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Close</button>
           </div>
       </div>
   </div>
   @endif
   {{-- End Alert --}}

    <!-- footer -->
    @include('layout.footer')

    <!-- Back to top Start -->
    <a id="to-top" href="#home" class="fixed hidden items-center justify-center bottom-4 right-4 z-[9999] p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- Back to top End -->

    @vite('resources/js/app.js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeBtn = document.getElementById('closeAlert');
            const alert = document.getElementById('myAlert');
            
            function hideAlert() {
                alert.style.display = 'none';
            }
    
            closeBtn.addEventListener('click', function() {
                hideAlert();
            });
        });
    </script>
</body>
</html>