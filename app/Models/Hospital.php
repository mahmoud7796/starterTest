<?php

namespace App\Models;

use App\Observers\HospitalObserver;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table ="hospitals";
    protected $fillable =  ['id','name','address','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    public function ScopeSelection($query){
        return $query -> select('id','name','address','created_at','updated_at');
    }

    public function doctors(){
        return $this-> hasMany(Doctor::class, 'hosiptal_id','id');
    }
    public function countries(){
        return $this-> belongsTo(country::class, 'country_id','id');
    }

    protected static  function boot(){
        parent::boot();
        Hospital::observe(HospitalObserver::class);
    }

}
