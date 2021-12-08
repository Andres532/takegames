@extends('layout.app')

@section('title', 'Producto')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">
<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="text-3xl text-center font-bold">Juegos</div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>
        @csrf
        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion" id="descripcion" style="height: 98; width:300;"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

        <label for="precio">precio</label>
        <input type="number" step="any" name="precio" id="precio" min="0"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>
        
        <label for="fecha_salida">fecha_salida</label>
        <input type="text" name="fecha_salida" id="fecha_salida"
        class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2"><br>

        
        <input class="w-full text-lg p-2 my-2 bg-blue-300"
        type="submit" value="Enviar" name="Enviar" id="Enviar">

        <div class="border border-red-200 rounded-md bg-red-500 text-lg p-2 my-2">
            <a href="{{ url('/relacion') }}"
            class="">
                Introducir imagen
            </a>
        </div>
    </fieldset>
</form>
</div>

@endsection