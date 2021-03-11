<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PhpParser\Builder\Trait_;

Trait General
{
     function saveImage($photo,$folder_path){
        $file_extension = $photo-> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder_path;
        $photo -> move($path,$file_name);
        return $file_name;
    }
}

//Test commit with router router
