<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    use HasFactory;

    protected $table = 'colecciones';
    protected $primarykey = 'id_coleccion';

    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_coleccion',
        'nombre',
        'activo'
    ];

}
