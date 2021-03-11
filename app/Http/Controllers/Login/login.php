<?php
namespace App\Http\Controllers\Login;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class login extends BaseController
{
public function loginTest(){
    return 'login test route namespace';
}

}
