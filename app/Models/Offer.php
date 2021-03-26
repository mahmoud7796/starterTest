<?php

namespace App\Models;

use App\Scopes\globalScope;
use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;
use phpDocumentor\Reflection\Types\Parent_;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['id','photo','name_en','name_ar','price','details_en','details_ar','created_at','updated_at','status'];
    protected $hidden = ['created_at','updated_at']; //hidden from all request and response
    //public $timestamps = false;

    public function ScopeSelection($query){
        return $query -> select('id','photo','name_'. LaravelLocalization::getCurrentLocale()  . ' as name',
            'price','details_'.LaravelLocalization::getCurrentLocale() . ' as details',
            'created_at','updated_at','status');

}

    public function ScopeActive($query){
        return $query -> where('status',1)->get();
    }

    public function ScopeSelection2($query){
        return $query -> select('id','photo','name_ar','name_en',
            'price','details_ar','details_en','status');
    }
    public function getPhotoAttribute($val){

      return  ($val!==null) ? asset($val) : "";

    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new globalScope());
    }

//test
}
