<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarfy | {{ $_SESSION['halaman'] }}</title>
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
    @include('layout.header')
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
                    <input type="text" id="nim" name="nim" required class="border border-slate-500 rounded-l-lg w-full text-dark p-3 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" value="{{ old('email') }}" placeholder="Masukkan NIM kamu..."/>
                    <button type="submit" class="bg-primary hover:opacity-70 hover:bg-primary text-white font-medium rounded-r-lg px-8 py-2">Cek</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </section>

<!-- Portfolio Section Start -->

<section id="portfolio" class="pb-16 pt-16 dark:bg-slate-800">
    <div class="container max-w-screen relative mt-8">
        @if(isset($eligible) && count($eligible) > 0)
        <div class="w-full px-4 -mt-12">
            <div class="max-w-xl mx-auto text-center mb-8">
                {{-- <h4 class="font-semibold text-lg text-primary mb-2">{{ count($eligible) }}</h4> --}}
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Beasiswa Eligible</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Ada <span class="text-primary">{{ count($eligible) }}</span> beasiswa eligible untuk Kamu</p>
            </div>
        </div>
        <div class="flex flex-wrap mt-4">
            @foreach($eligible as $data)
                <div class="mt-10 w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-slate-800">
                        <img src="{{ $data['image']}}" alt="{{ $data['namaBeasiswa'] }}" class="w-full">
                        <div class="py-8 px-6">
                            <h3>
                                <a href="{{ url('/detail-beasiswa/'. $data['idBeasiswa']) }}" class="block mb-3 font-semibold text-lg text-dark hover:text-primary truncate dark:text-white">{{ $data['namaBeasiswa'] }}</a>
                            </h3>
                            <span class="font-medium text-base text-secondary mb-6 dark:text-white">
                                {!! Str::limit( $data['deskripsi'], 100 ) !!}
                            </span>
                            <a href="{{ url('/detail-beasiswa/'. $data['idBeasiswa']) }}" class="font-medium text-sm text-primary hover:opacity-80 flex justify-end text-right">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>




   {{-- Alert --}}
   @if (isset($no_nim))
   <div id="myAlert" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
       <div class="bg-white w-1/3 p-6 rounded-xl shadow-xl border border-slate-200">
           <p class="text-xl font-bold mb-4">❌ Gagal</p>
           <p id="alertMessage" class="text-gray-700 mb-10">{{ $no_nim }}</p>
           <div class="flex items-center justify-center">
               <button id="closeAlert" class="bg-primary hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Close</button>
           </div>
       </div>
   </div>
   @endif

   @if (isset($error))
   <div id="myAlert" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
       <div class="bg-white w-1/3 p-6 rounded-xl shadow-xl border border-slate-200">
           <p class="text-xl font-bold mb-4">❌ Gagal</p>
           <p id="alertMessage" class="text-gray-700 mb-10">{{ $error }}</p>
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