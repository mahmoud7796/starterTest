<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OffersRequest;
use App\Helpers\General;


class AjaxController extends Controller
{
    use General;

    public function indexAJ(){
        $offers = Offer::selection()->limit(10)->get();
        return view('offerajax.index', compact('offers'));
    }

    public function create()
    {
        return view('offerajax.create');
    }

    public function store(OffersRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');

        // Offer::create($request -> except(['_token']));

/*        if($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/offers');
            $request -> photo = $file_name;
        }*/

        $offer = Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'price' => $request->price,

        ]);
        if($offer)
        return response()-> json([
           'status' => true,
           'msg' => 'تم الحفظ',
        ]);
        else
            return response() -> json([
                'status' => false,
                'msg' => 'لقد حدث خطأ يرجى المحاولة لاحقا',
            ]);

    }

    public function delete(Request  $request)
    {
        $offers = Offer::find($request-> id);
        $offers->delete();
        if($offers)
            return response() -> json([
                'status' => true,
                'msg' => 'تم الحفظ ',
                'id' => $request -> id,
            ]);
        else
            return response() -> json([
                'status' => false,
                'msg' => 'لقد حدث خطأ يرجى المحاولة لاحقا',
            ]);

    }

    public function edit($id)
    {
        $offers = Offer::find($id);
        if(!$offers)
        return response() -> json([
            'status' => false,
            'msg' => 'لقد حدث خطأ يرجى المحاولة لاحقا',
        ]);
        $offers = Offer::selection2()->find($id);
        return view('offerajax.edit', compact('offers'));

    }

    public function update(OffersRequest $request)
    {
        //  return $request;
        $offer = Offer::find($request -> edit_id);
        if(!$offer)
            return response() -> json([
                'status' => false,
                'msg' => 'لقد حدث خطأ يرجى المحاولة لاحقا',
            ]);

      //  $file_name = $this->saveImage($request->file('photo'), 'images/offers');
      // save Photo
        if($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/offers');
            $request -> photo = $file_name;
            $offer ->update([
                'photo' => $file_name,
            ]);
        }
        $offer ->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'price' => $request->price,
        ]);

        if($offer)
            return response() -> json([
                'status' => true,
                'msg' => 'تم الحفظ ',
                'id' => $request -> id,
            ]);


    }


}
