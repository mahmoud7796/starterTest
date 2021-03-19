<?php

namespace App\Http\Controllers;

use App\Models\Phone;

use App\User;
use Illuminate\Http\Request;

class OneRelationController extends Controller
{
    public function one(){
      return $data =  User::with(['phone' => function($q){
           $q ->  select('code', 'phone','user_id');
        }])->find(7);

        return  response()-> json($data);
    }

    public function  onereverse(){

 /*       return $phone = Phone::with(['users' => function($q){
              $q -> select('name','mobile','age','id');
            }])->find(1);*/

        //$phone = Phone::find(1);
       // $phone ->  makeVisible(['user_id']);
       // $phone ->  makeHidden(['code']);
         //$phone-> code ;
       return $phone = User::whereDoesntHave('Phone')-> get();
    }

    public function  Elq_condition(){
         $phone = User::whereHas('Phone', function($q){
             $q-> where('code','+23');
})-> get();
return $phone;
        // $phone = User::whereDoesntHave('Phone')-> get();
    }

}
