@extends('layout.app')

@section('content')

<div class="container mx-8 bg-gray-200">
    <div name="titulo" class="col-span-12 justify-self-center my-6 text-xl font-bold">{{$productos->nombre}}</div>

<div class="grid grid-cols-3">
    <div name="imagen" class="col-span-1">
    @foreach($imagenes as $imagen)
        @if($imagen->id_consola == $cat)
       <img src="{{ asset('storage'.'/'.$imagen->imagen) }}" alt="NOOO" width="200" height="300">
        @else
        @endif
    @endforeach
    </div>

    <div class="justify-self-start self-center">
        <div>PLATAFORMA</div>
        <div class="flex flex-1 ">
      @foreach($imagenes as $imagen)
            @foreach($consolas as $consola)
               @if($imagen->id_consola == $consola->id)
                 <div class="pr-4 border border-2 border-indigo-300 border-solid mr-2 bg-indigo-500">
                     <a href="{{url('/', ['categoria' => $imagen->id_consola, 'producto' => $imagen->id_producto])}}">
                         <div class="text-white font-medium">{{$consola->nombre}}</div>
                    </a>
                </div>
                @endif
            @endforeach
       @endforeach
        </div>
    </div>

    <div name="precio" class="justify-self-start self-center">
        <div>Precio</div>
        @if(auth()->check())
        <div>
            <p class="text-6xl">{{$productos->precio-($productos->precio*0.2)}}</p>
            <div><strike>{{$productos->precio}}</strike></div>
        </div>

        @else
        <div class="text-6xl">{{$productos->precio}}</div>

        @endif
    </div>
</div>
    <div class="col-span-3 my-6">
    <div>Descripción</div>
    <div name="desc" class="font-serif">{{$productos->descripcion}}</div>
    </div>
</div>
@endsection