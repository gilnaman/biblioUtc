<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoRegistros extends Model
{
    use HasFactory;

    protected $table = 'registro_accesos';

    protected $primaryKey = 'id_acceso';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable= [
    	'id_acceso',
    	'fecha',
    	'hora',
    	'id_actividad',
    	'matricula',
    ];
}
