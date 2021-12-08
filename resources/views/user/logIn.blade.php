@extends('layout.app')

@section('title', 'LogIn')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">



<form action="" method="post" class="mt-4">
    <fieldset>
        <div class="text-3xl text-center font-bold">Inicio de sesion</div>
        <label for="email">Correo</label>
        <input type="email" name="email" id="email"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>
        @csrf
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

        @error('message')

        <p class="border border-red-500 rounded-md br-red-100 w-full text-red-600 p-2 my-2">Correo o contraseña erroneo</p>
        @enderror()
        

        <input type="submit" value="Enviar" name="enviar" id="enviar"
        class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3">
    </fieldset>
</form>
</div>
@endsection()