<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table ="doctors";
    protected $fillable =  ['id','name','title','hosiptal_id'];
    protected $hidden = ['updated_at','created_at','hosiptal_id','pivot'];


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
