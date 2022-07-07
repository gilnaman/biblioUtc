<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;
    protected $table='libros';

    //llave primaria
    protected $primaryKey='isbn';

    //especificamos las relaciones de las ids
    public $with=['coleccion'];

    public $Incrementing=false;
    public $timestamps=true;
    
    //base de datos
    protected $fillable=[
        'titulo',
        'fecha_publicacion',
        'paginas',
        'created_at',
        'updated_at',
        'cutter',
        'dewey',
        'caratula'
      
    ];
    // llaves foraneas
    public function coleccion () {
        return $this->belongsTo(Coleccion::class, 'id_coleccion', 'id_coleccion');
     }
     public function pais () {
        return $this->belongTo(pais::class, 'id_pais', 'id_pais');
     }
}
