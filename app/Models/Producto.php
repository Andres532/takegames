<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function consolas(){
        return $this->belongsToMany(Consola::class, 'consola_productos');
    }
}
