<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function testC(){
        return 'test Controller';
    }

    public function __construct(){
      // $this -> middleware('auth')->except('testMiddleware3');

    }
    public function getWelcome(){

     /*   $object = new \stdClass();

        $object -> id = 5;
        $object -> name = 'Mahmoud D';
        $object -> age = 24;
        $object -> faculty = 'mass media';*/
        $data = ['name'=>'diab','age'=>24,'faculty'=>'mass media'];

        return view('welcome',compact('data'));
    }


}
