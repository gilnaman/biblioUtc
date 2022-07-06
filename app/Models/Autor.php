<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table='autores';
    protected $primaryKey='id_autor';

    public $incrementing=true;
    public $timestamps=false;

    public $fillable=[
        'id_autor',
        'nombre',
        'apellidos',
        'foto'
    ];
}
