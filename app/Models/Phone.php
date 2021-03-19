<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";
    protected $fillable = ['id','name','code','phone','user_id'];
    public $timestamps = false;
    protected $hidden  =['user_id'];

    public function ScopeSelection($query){
        return $query -> select('id','name','code','phone','user_id');
    }

    public function users(){
        return $this -> belongsTo(User::class, 'user_id');
    }


}
