<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css"/>
    <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
</head>

<body class="bg-gray-100 text-gray-800">
<nav class="flex py-5 bg-indigo-500 text-white">
    <div class="w-1/2 px-12 mr-auto">
        <a href="{{url('/')}}"><p class="text-2x1 font-bold">TakeGames</p></a>
    </div>

    <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
    @if(auth()->check())
        <p class="text-xl mx-6">Bienvenido, <b>{{auth()->user()->name}}</b></p>
        <li>
            <a href="{{ route('login.destroy') }}" 
            class="font-semibold border-2 bg-red-500 border-white py-2 px-4 rounded hover:bg-red-600 hover:text-indigo-700">LogOut</a>
        </li>
    @else
    <li class="mx-3">
            <a href="{{ route('login.index') }}" 
            class="font-semibold border-2 border-white py-2 px-4 rounded hover:bg-white hover:text-indigo-700">LogIn</a>
        </li>
        <li>
            <a href="{{ route('registro.index') }}" 
            class="font-semibold border-2 border-white py-2 px-4 rounded hover:bg-white hover:text-indigo-700">Registro</a>
        </li>


    @endif
    </ul>
</nav>
    
@yield('content')



</body>
</html>