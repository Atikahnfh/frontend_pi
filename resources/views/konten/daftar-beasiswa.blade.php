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
    {{-- <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
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
                                <a href="#" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Daftar Beasiswa</a>
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
    </header> --}}
    @include('layout.header')
    <!-- Header End -->

    <!-- About Section Start -->
    <section id="about" class="pt-36 pb-32 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-bold uppercase text-primary text-lg mb-3">Daftar Beasiswa</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">Temukan Beasiswa yang Cocok untuk Kamu!</h2>
                    <!-- <p class="font-medium text-base text-secondary max-w-xl lg:tx-lg">Scholarfy membantu anda mendapatkan beasiswa terbaik. Anda dapat memeriksa eligibilitas anda pada scholarfy. Scholarfy juga memberikan informasi terupdate seputar beasiswa.</p> -->
                </div>
            </div>

            <?php $beasiswa = $beasiswa['data']; ?>

            <div class="flex flex-wrap">
                <?php $i = 0; ?>
                @while(isset($beasiswa[$i]))  
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-slate-800">
                        <img  src="{{ $beasiswa[$i]['image'] }}" alt="Programming" class="w-full">
                        <div class="py-8 px-6">
                            <h3>
                                <a href="{{ url('/detail-beasiswa/'.$beasiswa[$i]['idBeasiswa']) }}" class="block mb-3 font-semibold text-lg text-dark hover:text-primary truncate dark:text-white">{{$beasiswa[$i]['namaBeasiswa']}}</a>
                            </h3>
                            <span class="font-medium text-base text-secondary mb-6 dark:text-white">
                                {!! Str::limit($beasiswa[$i]['deskripsi'], 100 ) !!}
                            </span>
                            <a href="{{ url('/detail-beasiswa/'.$beasiswa[$i]['idBeasiswa']) }}" class="font-medium text-sm text-primary hover:opacity-80 flex justify-end text-right">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                @endwhile
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- footer -->
    @include('layout.footer')

    <!-- Back to top Start -->
    <a id="to-top" href="#home" class="fixed hidden items-center justify-center bottom-4 right-4 z-[9999] p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- Back to top End -->

    @vite('resources/js/app.js')

</body>
</html>