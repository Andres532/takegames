@extends('layout.app')

@section('title', 'Consolas')

@section('content')

<nav class="flex flex-justify-center md:flex-row sm:flex-col bg-indigo-400 py-1 px-3">
    @foreach($categorias as $categoria)
    
        <a class="flex-auto mx-5 my-2 bg-blue-900 border-red-800 border-2 border-solid text-white text-2x1 text-center" href="{{url('/', ['categoria' => $categoria->id])}}">{{$categoria->nombre}}</a>
    
    @endforeach

    <div class="border-gray-300 border-2 border-solid h-7 v-auto my-2">
    <form action="{{ url('/order') }}" method="post">
    @csrf
    <select class="use-chosen" name="sort" class="h-auto">
        <option value="default">default</option>
        <option value="pre-desc">Mayor a menor precio</option>
        <option value="pre-asc">Menor a mayor precio</option>
        <option value="alf-desc">A-Z</option>
    </select>
    <input type="submit" value="Enviar" class="h-auto">
    </form>
    </div>

    <div class="mx-5 border-gray-300 border-2 border-solid h-7 my-2">
        <form action="{{url('/nombre')}}" method="post">
        @csrf
            <input type="text" name="textoNomb" id="textoNomb" class="h-full">
            <input type="submit" value="Enviar" class="h-full">
        </form>
    </div>
</nav>

<div class="flex md:flex-row sm:flex-col my-2">
    @foreach($consolas as $consola)
    <div class="w-1/4 ">
    <a href="{{ url('/', ['categoria' => $consola->id_consola, 'producto' => $consola->id_producto]) }}">
        <div>
            <img src="{{ asset('storage'.'/'.$consola->imagen) }}" alt="NOOO" width="200" height="300">
        </div>
    

    @foreach($productos as $producto)
    @if($producto->id == $consola->id_producto)
    
    
        <div class="mr-8">
            {{ $producto->precio}}
        </div>
    </a>
    </div>
    @endif
    @endforeach

    @endforeach
</div>
<br>
    <span>
        {{$consolas->links()}}
    </span>

@endsection()