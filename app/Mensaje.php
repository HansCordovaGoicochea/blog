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

    public function note()
    {
        // el mensaje tiene nota
        return $this->morphOne(Note::class, 'notable');
    }
    public function tags()
    {
        // el mensaje tiene nota
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
