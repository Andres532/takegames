<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consola extends Model
{
    use HasFactory;

    protected $table = "consola";

    public function productos(){
        return $this->belongsToMany(Productos::class, 'consola_productos');
    }
}
