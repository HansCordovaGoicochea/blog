<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'clave', 'nombre', 'descripcion'
    ];

    //
    public function user(){
//        Tiene uno
        return $this->hasOne(User::class);
//        return $this->hasMany(User::class);
    }
}
