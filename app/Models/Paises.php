<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;
    protected $table = "paises";
    protected $primaryKey="id_pais";
    public $incrementing = true;
    public $timestamp = false;

    protected $fillable = [
        'id_pais',
        'nombre_pais'
    ];
}
