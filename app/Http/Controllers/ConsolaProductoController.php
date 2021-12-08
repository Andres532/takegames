<?php

namespace App\Http\Controllers;

use App\Models\ConsolaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Consola;
use App\Http\Controllers\Input;


class ConsolaProductoController extends Controller
{
    public $sorting;

    public function mo(){
        $this->sorting = "default";
    }

    public function index(){

        $productos = producto::all();
        $consolas = ConsolaProducto::paginate(9);
        $categoria = Consola::all();
        return view('home', ['productos' => $productos, 'consolas' => $consolas, 'categorias' => $categoria]);
    }

    public function create(){
        //
        $productos = producto::all();
        return view('consolaProducto', ['productos' => $productos]);
    }

    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');
        //$datos = $request->except('Enviar');

        if($request->hasFile('imagen')){
            $datos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        ConsolaProducto::insert($datos);
        return view('consolaProducto');
    }

    public function consolas($categoria){
        $productos = producto::all();
        $consolas = ConsolaProducto::select('*')->where([['id_consola', '=', $categoria]])->paginate(5);
        $categorias = Consola::all();
        return view('seleccion', ['productos' => $productos, 'consolas' => $consolas, 'categorias' => $categorias]);
    }

    public function ordene(Request $request){
        $ordenes = $request->get('sort');
        
        
        if($ordenes == "pre-desc"){
            $productos = producto::orderBy('productos.precio', 'DESC')->get();
        }
        else if($ordenes == "pre-asc"){
            $productos = producto::orderBy('productos.precio', 'ASC')->get();
        }
        else if($ordenes == "alf-desc"){
            $productos = producto::orderBy('productos.nombre', 'ASC')->get();
        }
        else{
            $productos = producto::all();
        }

        
        $consolas = ConsolaProducto::all();
        $categoria = Consola::all();
        return view('ordenado', ['productos' => $productos, 'consolas' => $consolas, 'categorias' => $categoria]);
    }

    public function nombre(Request $request){
        $nom = $request->get('textoNomb');

        
        $productos = producto::select('*')->where('nombre', 'like', '%'.$nom.'%')->get();
        

        $consolas = ConsolaProducto::all();
        $categoria = Consola::all();

        return view('ordenado', ['productos' => $productos, 'consolas' => $consolas, 'categorias' => $categoria]);

    }
}
