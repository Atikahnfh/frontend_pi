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

<section id="portfolio" class="pt-36 pb-16 dark:bg-slate-800">
    <div class="container max-w-screen relative mt-8">
        <div class="w-full px-4 -mt-12">
            <div class="max-w-xl mx-auto text-center mb-8">
                <h4 class="font-semibold text-lg text-primary mb-2">Beasiswa</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Beasiswa Terbaru</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Jelajahi informasi terbaru beasiswa dan jadilah awardee beasiswa dari beasiswa-beasiswa terbaik di dunia.</p>
            </div>
        </div>
        
        <?php $beasiswa = $beasiswa['data']; ?>

        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            <?php $i = 0; ?>
            @while(isset($beasiswa[$i]))                            
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-t-md shadow-md overflow-hidden bg-white ">
                    <img src="https://img.freepik.com/premium-vector/3d-hand-throwing-graduation-hats-air_169241-7265.jpg" class="w-full h-64 mx-auto" alt="img1" />
                </div>
                <div class='bg-slate-200 rounded-b-lg px-8 -mt-5'>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-slate-500">
                    <a href="{{url('/posts/detailbeasiswa/'.$beasiswa[$i]['idBeasiswa'])}}" class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out justify-center">{{$beasiswa[$i]['namaBeasiswa']}}</a>
                    
                    
                    </h3>
                    <div class="mx-96 justify-center pl-44 -mt-8 pb-8">
                       
                     </div>
                    <!-- <p class="font-medium text-justify text-base text-secondary -mt-4 pb-3">{{$beasiswa[$i]['deskripsi']}}</p> -->
                </div>
            </div>
            <?php $i++; ?>
            @endwhile
        </div>
        
        
    </div>
</section>

<!-- Back to top Start -->
<a id="to-top" href="#home" class="fixed hidden items-center justify-center bottom-4 right-4 z-[9999] p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- Back to top End -->

    @vite('resources/js/app.js')

</body>
</html>