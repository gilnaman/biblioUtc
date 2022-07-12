<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';
    protected $primaryKey = 'id_actividad';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable= [
    	'id_actividad',
    	'actividad',
    	
    ];
}
