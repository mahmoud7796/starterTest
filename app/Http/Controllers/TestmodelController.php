<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class TestmodelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
         Offer::create([
             'name' => 'mahmoud Diab test',
             'price' => '500 L.E',
             'details' => 'offer details',
         ]);

    }
}
