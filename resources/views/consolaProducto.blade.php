@extends('layout.app')

@section('title', 'Imagenes')

@section('content')
<div class="flex md:flex-row xs:flex-col p-8 justify-center">
<div>
<form action="" method="post" enctype="multipart/form-data">
    <label for="id_producto">id_producto</label>
    <input type="number" name="id_producto" id="id_producto" 
    class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2">
    <br><br>
    @csrf
    <label for="id_consola">id_consola</label>
    <input type="number" name="id_consola" id="id_consola" 
    class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2">
    <br><br>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen"class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2">
    <br>

    <input type="submit" value="Enviar" class="w-full text-lg p-2 my-2 bg-blue-300">
</form>
</div>

<div>
<table>
@foreach($productos as $producto)
<tr>
    <td>{{$producto->nombre}}</td>
    <td>{{$producto->id}}</td>
</tr>

@endforeach
</table>
</div>
</div>
@endsection