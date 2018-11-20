<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['title','resumen','slug','status','imagen','created_at','content','user_id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $search){
        if ($search) {
            return $query->where(DB::raw("CONCAT(title, ' ', content,' ',resumen)"), 'LIKE', "%".$search."%");
        }
    }
}
