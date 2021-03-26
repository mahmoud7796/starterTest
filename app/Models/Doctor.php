<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table ="doctors";
    protected $fillable =  ['id','name','country_id','title','hosiptal_id','medical_id'];
    protected $hidden = ['updated_at','created_at','hosiptal_id','pivot','laravel_through_key','medical_id',];


    public function ScopeSelection($query){
      return $query -> select('id','name','title');
    }

    public function hospital(){
        return $this-> belongsTo(Hospital::class, 'hosiptal_id','id');
    }
    public function services(){
        return $this-> belongsToMany(ServiceModel::class, 'doctors_services', 'doctor_id','service_id','id','id');
    }

}
