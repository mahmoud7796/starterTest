<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment\Doc;

class country extends Model
{
    protected $table = "countries";
    protected $fillable = ['id','name'];
    protected $hidden = [];
    public $timestamps = false;

    public function doctors(){
        return $this -> hasManyThrough(Doctor::class,Hospital::class,'country_id','hosiptal_id','id','id');
    }
    public function hospitals(){
        return $this -> hasMany(Hospital::class,'country_id','id');
    }

}

