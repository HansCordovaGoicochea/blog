<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nombre'];

    public function mensaje()
    {
        return $this->morphedByMany(Mensaje::class, 'taggable');
    }
    public function users()
    {
        return $this->morphedByMany(User::class, 'taggable');
    }
}
