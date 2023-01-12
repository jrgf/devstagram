@extends('layouts.app')
@section('titulo')
   Inicia Sesión En Devstagram
   
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12 p-5">
           <img src="{{asset('img/login.jpg')}}" alt="Imagen Login de Registro">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form  method="POST" action="{{route('login')}}" novalidate>
                @csrf
               @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
               @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block text-uppercase text-gray-500 font-bold">
                        E-mail 
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        placeholder="Tu E-mail De Registro"
                        value="{{old('email')}}"
                    />
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block text-uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="border p-3 w-full rounded-lg  @error('password') border-red-500 @enderror"
                        placeholder="Tu Contraseña de Registro "
                    />
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                    
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label class=" text-gray-500 text-sm"> 
                        Mantener Mi Sesión Abierta
                    </label>
                </div>
                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                    text-uppercase font-bold w-full p-3 text-white rounded-lg"
                 />
            </form>
        </div>
    </div>
@endsection