<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OffersRequest;
use App\Helpers\General;


class AjaxController extends Controller
{
    use General;

    public function create()
    {
        return view('offerajax.create');
    }

    public function store(OffersRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');

        // Offer::create($request -> except(['_token']));
        Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'price' => $request->price,

        ]);

    }
}
