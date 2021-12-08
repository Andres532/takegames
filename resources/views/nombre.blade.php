@extends('layout.app')

@section('title', 'Home')

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

<div>
    @if($productos->isEmpty()){
        <div>No se pudo encontrar el producto</div>
    }
    @else
    @foreach($consolas as $consola)
        @if($producto->id == $consola->id_producto)
        <div class="w-1/4 border-solid border-2 border-indigo-500 justify-self-center">
            <a href="{{ url('/', ['categoria' => $consola->id_consola, 'producto' => $consola->id_producto]) }}">
        <div class="">
            <img src="{{ asset('storage'.'/'.$consola->imagen) }}" alt="NOOO" width="200" height="300">
        </div>
    
        <div class="mr-8">
            @if(auth()->check())
        <div class="text-center">{{$producto->precio-($producto->precio*0.2)}}</div>

        @else
        <div class="text-center">{{$producto->precio}}</div>

        @endif
        </div>
            </a>
        </div>
        @endif
    
    @endforeach

    @endif
</div>