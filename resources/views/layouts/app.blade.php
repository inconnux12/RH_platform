<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/emoji.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon.min.css')}}">
    <script src="{{ asset('js/alpinejs.min.js') }}" defer></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    @livewireStyles
    <title>RH Plateforme</title>
</head>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
    <livewire:nav-component />
        <div class="flex flex-col md:flex-row">
           <livewire:side-component />
            <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h3 class="font-bold pl-2">DASHBOARD</h3>
                    </div>
                </div>
                <div class="mx-auto">
                    @yield('content') 
                </div>
            </div>
        </div>
    <footer class="max-w-lg mx-auto flex justify-center text-white">
        <a href="#" class="hover:underline">Contact</a>
        <span class="mx-3">•</span>
        <a href="#" class="hover:underline">Privacy</a>
    </footer>
    <script src="{{asset('js/alp.js')}}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>
    
</html>