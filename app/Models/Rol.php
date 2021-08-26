<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';

    protected $fillable = ['rol', 'estado_rol'];

    /* funsiones para las relaciones de modelos entre rol y usuario */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}