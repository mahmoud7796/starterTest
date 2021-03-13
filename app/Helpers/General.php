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
}

//Test commit with router router
