<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table ="doctors";
    protected $fillable =  ['id','name','title','hosiptal_id'];
    protected $hidden = ['hosiptal_id'];


    public function ScopeSelection($query){
      return $query -> select('id','name','title','hospital_id');
    }

    public function hospital(){
        return $this-> belongsTo(Hospital::class, 'hosiptal_id','id');
    }

}
