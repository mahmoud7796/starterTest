<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\medical;
use App\Models\patient;
use App\Models\Phone;
use App\Models\ServiceModel;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

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

    public function docserv(){
       $doctor = Doctor::with('services')-> find(4);
       return $doctor -> services;

    }

    public function servdoc(){
      return  $service = ServiceModel::with(['doctors'=> function($q){
          $q-> select('doctors.id','name','title');
      }])-> find(2);
        //return $service -> doctors;
    }
    public function indexmany(){
         $doctors = Doctor::whereHas('services')-> selection()-> get();
        return view('hospital.doctor', compact('doctors'));

    }
    public function services($id){
         $doctors = Doctor::find($id);
         $services = $doctors -> services;
         $allservices = ServiceModel::select('id','name')-> get();
       // $alldoctors = Doctor::select('id','name')-> get();
          $alldoctors[] = Doctor::find($id);

        return view('hospital.service', compact('services','allservices','alldoctors'));

    }
    public function storedb(Request $request){
      //  return $request;
        $doctor = Doctor::find($request -> doctor_idd);

        //$doctor -> services() -> sync($request -> services_id);
        $doctor -> services() -> syncWithoutDetaching($request -> services_id);
        return "success";
    }

    public function onethr(){
         $pdf =  patient::with('doctors')-> find(2);
        return $pdf -> doctors;

    }
    public function through($id = 1){
         $pdf =  patient::with('doctors')->find($id);
            $doctors[] =  $pdf -> doctors;
       return view('hospital.through', compact('doctors'));

    }

    public function throughmany(){
        return $countries = country::with('doctors')->find(1);
      //  return  $doctors = $countries -> doctors;

       // return $countries = country::with('hospitals')->find(2);
       // $doctors = $countries -> doctors;

    }



}
