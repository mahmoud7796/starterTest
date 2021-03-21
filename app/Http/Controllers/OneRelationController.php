<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
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

    public function index()
    {
      $data = Hospital::whereHas('doctors')-> get();
        return view('hospital.index',compact('data'));
    }

    public function indexD($id)
    {
         $hopital = Hospital::with('doctors')->find($id);
        $doctors =  $hopital -> doctors;
        return view('hospital.doctors',compact('doctors'));
    }


    public function  many(){
/*    $data =  Hospital::with(['doctors' => function($q){
$q -> select('name','hosiptal_id');
    }])->where('name','مستشفى الحياة')->get();

        $data ->  makeHidden(['id', 'address']);
        return $data;*/

        $data = Hospital::find(1);
      return $docs = $data -> doctors;

      //  foreach ($docs as $doc){
       //     echo $doc ->name;
      //  }
        $doctor =Doctor::find(2);
       return $doctor -> hospital-> id;
    }
    public function hasdoc(){
        return $hospital = Hospital::whereHas('doctors')->get();

    }
    public function hasmale(){
         return  $doctors = Hospital::with('doctors')->wheredoesntHave('doctors', function($q){
            $q -> where('gender',1);

        })->get();

    }
    public function delete($id){
          $hospital = Hospital::find($id);
       if(!$hospital)
           return abort('404');
        $hospital -> delete();
        return redirect()-> route('hospital.index')-> with(['success'=> 'تم الحذف يمعلم']);
    }


}
