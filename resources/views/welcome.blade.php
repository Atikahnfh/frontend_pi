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
    <!-- header -->
        @include('layout.header')
    
    <!-- hero -->
        @include('layout.hero')
    
    <!-- about -->
        @include('layout.about')
    
    <!-- portfolio -->
        @include('layout.portfolio')
   
    <!-- clients -->
        @include('layout.clients')
   
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