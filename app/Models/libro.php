<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table='libros';

    //llave primaria
    protected $primaryKey='isbn';

    
    public $with=['coleccion'];//especificamos las relaciones de las ids

    public $Incrementing=false;// la clave primaria es numerica
    public $timestamps=true;  //se va a utilizar etiquetas de tiempo
    
    //lista de campos que van a consumir valor
    protected $fillable=[
        'titulo',
        'fecha_publicacion',
        'paginas',
        'cutter',
        'dewey',
        'caratula'
      
    ];

    // public function colecion () // encarga de hacer la union o relacion
    // {
    //     return $this->belongsTo(::class, 'id_colecion', 'id_colecion');
    // }
}
