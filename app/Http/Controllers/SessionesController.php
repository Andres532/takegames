<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionesController extends Controller
{
    public function create(){
        return view('user.logIn');
    }

    public function store(Request $request){


        if(Auth::attempt(request(['email', 'password'])) == false){
            return back()->withErrors(['message' => 'email o password erroneos']);
        }
        else {
            if(auth()->user()->role == 'admin'){
                return redirect()->route('producto.create');
            }
            else{
                return redirect()->to('/');
            }
        }

       

    }

    public function destroy(){
        Auth::logout();

        return redirect()->to('/');
    }
}
