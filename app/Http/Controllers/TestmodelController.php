<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
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
    public function store(OffersRequest $request)
    {

      //  return redirect()->back()->withErrors()->withInput()($request->all());

      Offer::create($request -> except(['_token']));

        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح ف الداتا بيز']);

    }

    public function create(){
        return view('offers.create');
    }

    public function index(){
      $offers =  Offer::selection()->get();
        return view('offers.index', compact('offers'));
    }
}
