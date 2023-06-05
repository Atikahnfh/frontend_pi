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
                <div class="rounded-md shadow-md overflow-hidden">
                    <a href="{{ url('/detail-beasiswa/'.$beasiswa[$i]['idBeasiswa']) }}">
                        <img src="{{ $beasiswa[$i]['image'] }}" width="w-full" alt="Landing Page">
                    </a>
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">
                    <a href="{{ url('/detail-beasiswa/'.$beasiswa[$i]['idBeasiswa']) }}" class="block font-semibold text-lg text-dark hover:text-primary truncate dark:text-white dark:hover:text-primary">{{ $beasiswa[$i]['namaBeasiswa'] }}</a>
                </h3>
                <span class="font-medium text-justify text-base text-secondary">
                    {!! Str::limit($beasiswa[$i]['deskripsi'], 100) !!} 
                </span>
            </div>
            <?php $i++; ?>
            @endwhile
        </div>
        
        <div class="w-full flex justify-center">
            <div class="w-60">
                <a href="{{ url('/daftar-beasiswa') }}" class="inline-flex justify-center text-base font-medium text-white text-md bg-primary py-2 px-4 rounded-3xl w-full hover:opacity-80 hover:shadow-lg transition duration-500">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Section End -->
  