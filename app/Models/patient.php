<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = "patients";
    protected $fillable = ['id','name'];
    public $timestamps = false;

    public function doctors(){
        return $this -> hasOneThrough(Doctor::class,medical::class,'patient_id','medical_id','id','id');
    }

}
