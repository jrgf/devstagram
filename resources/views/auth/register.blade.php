@extends('layouts.app')
@section('titulo')
   Registrate En Devstagram
   
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12 p-5">
           <img src="{{asset('img/registrar.jpg')}}" alt="Imagen de Registro">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block text-uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Tu Nombre"
                        value="{{old('name')}}"
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block text-uppercase text-gray-500 font-bold">
                        Nombre de Usuario
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="Tu Nombre de Usuario"
                        value="{{old('username')}}"
                    />
                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="mb-2 block text-uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="border p-3 w-full rounded-lg"
                        placeholder="Repite tu Contraseña"
                    />
                    
                </div>
                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                    text-uppercase font-bold w-full p-3 text-white rounded-lg"
                 />
            </form>
        </div>
    </div>
@endsection