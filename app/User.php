<?php

namespace App;
use App\Profession;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','created_at'
    ];

    public $timestamps = false;

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
