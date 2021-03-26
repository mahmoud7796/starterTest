<?php

namespace App\Http\Controllers;

use App\Events\youtubeWachers;
use App\Http\Requests\OffersRequest;
use App\Models\Offer;
use App\Models\video;
use App\Scopes\globalScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\General;

class TestmodelController extends Controller
{
    use General;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OffersRequest $request)
    {

        //  return redirect()->back()->withErrors()->withInput()($request->all());

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


        return redirect()->route('offers.index')->with(['success' => 'تم الحفظ بنجاح يامعلم']);
    }


    public function create()
    {
        return view('offers.create');
    }

    public function index()
    {
     //  return $offers = Offer::selection()->limit(10)->get();
      //  return view('offers.index', compact('offers'));
         $offers = Offer::selection()->paginate(5); // pagination
        return view('offers.index', compact('offers'));


    }
    public function pagination()
    {
        //  return $offers = Offer::selection()->limit(10)->get();
        //  return view('offers.index', compact('offers'));
        $offers = Offer::WithoutGlobalScope(globalScope::class)-> get(); // pagination
        return view('offers.pagination', compact('offers'));


    }

    public function edit($id)
    {

        $offers = Offer::find($id);
        if (!$offers)
            return redirect()->route('offers.index')->with(['success' => 'العرض دا مش موجود']);

        $offers = Offer::selection2()->get()->find($id);
        return view('offers.edit', compact('offers'));
    }

    public function update($id, OffersRequest $request)
    {
        //  return $request;
        $offers = Offer::find($id);
        if (!$offers)
            return redirect()->route('offers.index')->with(['success' => 'العرض دا مش موجود']);
        $offer = Offer::selection2()->get()->find($id);

        $offer->update($request->except(['_token']));
        return redirect()->route('offers.index')->with(['success' => 'تم التحديث']);

    }

    public function delete($id)
    {
        $offers = Offer::find($id);
        if (!$offers)
            return redirect()->route('offers.index')->with(['success' => 'العرض دا مش موجود']);
        $offer = Offer::selection2()->get()->find($id);
        $offer->delete();
        return redirect()->route('offers.index')->with(['success' => 'تم الحذف']);
    }

     public function first_time(Request $request){
        $session = $request->session();
        ($session->has('first_visit')) ? $session->put('first_visit', false) : $session->put('first_visit', true);
        return view('first_time', ['first_visit' => $session->get('first_visit')]);
    }



    public function youtube(Request $request)
    {
        $video = video::first();
        event(new youtubeWachers($video));
       return view('youtube',compact('video'));
    }


}
