<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //

    public $timestamps = false;
    protected $table = 'alumno';
    protected $primaryKey = 'idalumno';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Telefono'
    ];
}
