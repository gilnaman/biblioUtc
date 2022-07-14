<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table='actividades';
    protected $primaryKey='id_actividad';

    public $incrementing=true;
    public $timestamps=true;

    public $fillable=[
        'id_actividad',
        'actividad',
    ];
}
