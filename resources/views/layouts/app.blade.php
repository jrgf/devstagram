<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>Devstagram-@yield('titulo')</title>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles()
    </head>
    <body class="bg-gray-100">
        
            <header class="p-5 border-b bg-white shadow">
                <div class="container mx-auto flex justify-between items-center">
                    <a href="{{route('home')}}"><h1 class="text-3xl font-black">Devstagram</h1></a>
                    
                
               
                    @guest
                    <nav class="flex gap-2">
                        <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                        <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                    </nav>
                    @endguest
                    @auth
                    <nav class="flex gap-2 items-center justify-center">
                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 text-sm font-bold cursor-pointer uppercase" href="{{route('posts.create')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Crear
                        </a>
                        <a href="{{route('posts.index',auth()->user()->username)}}" class="font-bold  text-gray-600 text-sm">
                            Hola:
                            <span class="font-normal">
                                {{auth()->user()->username}}
                            </span>
                        </a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar Sesi??n
                            </button>
                        </form>
                        
                    </nav>
                    @endauth
                   
                
            </div>
            </header>
            <main class="container mx-auto mt-10">
                <h2 class="text-center font-black text-3xl mb-3">
                    @yield('titulo')
                </h2>
                @yield('contenido')
            </main>
            <footer class="text-center p-5 text-gray-500 font-bold uppercase">
                    Devstagram-Todos los derechos reservados {{now()->year}}
            </footer>
            @livewireScripts()
    </body>
</html>