<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    protected $table = "services";
    protected $fillable = ['id','name'];
    public $timestamps = true;
    protected $hidden  =['created_at','uptated_at','pivot'];

    public function ScopeSelection($query){
        return $query -> select('id','name');
    }

    public function doctors(){
         return $this-> belongsToMany(Doctor::class, 'doctors_services', 'service_id','doctor_id','id','id');
        }
}
