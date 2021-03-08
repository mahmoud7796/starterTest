<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['id','name','price','details','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at']; //hidden from all request and response
    //public $timestamps = false;

    public function ScopeSelection($query){
        return $query -> select('id','name','price','details','created_at','updated_at');

}

//test
}
