<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PhpParser\Builder\Trait_;

Trait General
{
     function saveImage($photo,$folder_path){
       $image_name = $photo -> move($folder_path,$photo->hashName());
        return $image_name;
    }

/*    function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }*/
}

/*$file_extension = $request ->photo -> getClientOriginalExtension();
$file_name = time().'.'.$file_extension;
$path = 'images/';
$request -> photo -> move($path,$file_name);

user::create([
    'photo' => $filepath

]);*/


/*
$file_extension = $request ->photo -> getClientOriginalExtension();
$file_name = time().'.'.$file_extension;
$path = 'images/';
$request -> photo -> move($path,$file_name);

user::update([
    'photo' => $filepath

]);

}*/

//Test commit with router router
