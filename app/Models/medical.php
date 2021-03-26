<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medical extends Model
{
    protected $table = "medicals";
    protected $fillable = ['id','pdf','patient_id'];
    protected $hidden = ['patient_id'];
    public $timestamps = false;

}
