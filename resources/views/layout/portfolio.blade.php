<!-- Portfolio Section Start -->
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
            @while(isset($beasiswa[$i]) && $i < 4)                            
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-t-md shadow-md overflow-hidden bg-white ">
                    <img src="https://img.freepik.com/premium-vector/3d-hand-throwing-graduation-hats-air_169241-7265.jpg" class="w-full h-64 mx-auto" alt="img1" />
                </div>
                <div class='bg-slate-200 rounded-b-lg px-8 -mt-5'>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-slate-500">
                    <a href="{{url('/posts/detailbeasiswa/'.$beasiswa[$i]['idBeasiswa'])}}" class="block mb-3 font-semibold text-lg text-dark hover:text-primary truncate dark:text-white">
                        {{$beasiswa[$i]['namaBeasiswa']}}
                    </a>
                    </h3>
                    <!-- <p class="font-medium text-justify text-base text-secondary -mt-4 pb-3">{{$beasiswa[$i]['deskripsi']}}</p> -->
                </div>
            </div>
            <?php $i++; ?>
            @endwhile
        </div>
        
        <div class="mx-96 justify-center pl-44 -mt-8 pb-8">
            <a href="{{url('daftar-beasiswa')}}" class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out justify-center">Lihat Selengkapnya</a>
        </div>
    </div>
</section>

    
    <!-- Portfolio Section End -->
  