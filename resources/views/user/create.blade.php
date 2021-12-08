@extends('layout.app')

@section('title', 'Registro')

@section('content')
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">
<form action="" method="post" class="mt-4">
<fieldset>
<div class="text-3xl text-center font-bold">Registro</div>
    @csrf <!-- Codigo de seguridad importante para registro y evitar error 419-->
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" placeholder="Introduce tu nombre"
    class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

    @error('name')

        <p class="border border-red-500 rounded-md br-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
    @enderror()

    <label for="email">Correo</label>
    <input type="email" name="email" id="email" placeholder="Introduce tu correo"
    class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

    @error('email')

        <p class="border border-red-500 rounded-md br-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
    @enderror()

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" placeholder="Introduce tu contraseña"
    class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

    @error('password')

        <p class="border border-red-500 rounded-md br-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>
    @enderror()

    <input type="submit" value="Registrarse" name="enviar" id="enviar"
    class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3">
</fieldset>

</form>
</div>
@endsection()