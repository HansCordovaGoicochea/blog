<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $fillable = [
        'nombre', 'email', 'mensaje'
    ];

    public function user(){
        // el mensaje pertenece a un usuario
        return $this->belongsTo(User::class);
    }
}
