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

<div class="bg-indigo-500">
<div class="flex-1 flex-wrap px-8 bg-gray-100">
@foreach($categorias as $categoria)
<div class="w-full pt-6 pb-2">
        <div>{{$categoria->nombre}}</div>
      </div>
<div class="carousel rounded-box carousel-end flex border-solid border-4 border-indigo-500 divide-x divide-blue-800">
      
    @foreach($productos as $producto)
        @foreach($consolas as $consola)

        @if($producto->id == $consola->id_producto && $consola->id_consola == $categoria->id)
        <div class="carousel-item p-2 flex-auto">
        <a href="{{ url('/', ['categoria' => $consola->id_consola, 'producto' => $consola->id_producto]) }}">
        <img class="object-scale-down h-45" src="{{ asset('storage'.'/'.$consola->imagen) }}" alt="NOOO" width="250" height="350">
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
    @endforeach
</div>
@endforeach
 
</div>
@endsection()
</div>