<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['id','photo','name_en','name_ar','price','details_en','details_ar','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at']; //hidden from all request and response
    //public $timestamps = false;

    public function ScopeSelection($query){
        return $query -> select('id','photo','name_'. LaravelLocalization::getCurrentLocale()  . ' as name',
            'price','details_'.LaravelLocalization::getCurrentLocale() . ' as details',
            'created_at','updated_at');

}
    public function ScopeSelection2($query){
        return $query -> select('id','photo','name_ar','name_en',
            'price','details_ar','details_en');

    }
    public function getPhotoAttribute($val){

      return  ($val!==null) ? asset($val) : "";

    }

//test
}
