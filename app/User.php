<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  bcrypt($password);
    }

    public function roles(){
        //pertenece a:
//        return $this->belongsTo(Role::class);
        //pertenece a muchos:
        return $this->belongsToMany(Role::class, 'asignar_roles');
    }

    public function hasRoles(array $roles){

        return $this->roles->pluck('clave')->intersect($roles)->count();
//        foreach ($roles as $role) {
//
////            foreach ($this->roles as $user_role) {
////                if ($user_role->clave === $role){
////                    return true;
////                }
////            }
//        }
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function mensajes()
    {
        //un usuario puede tener muchos mensajes
        return $this->hasMany(Mensaje::class);
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
