<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Events\AcademyViewed;
use App\Http\Requests\NewAcademy;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academies = Academy::all();
        return view('academies.index', compact('academies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('academies.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\NewAcademy|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NewAcademy $request)
    {

        $academy = Academy::create($request->all());

        $academy->tags()->sync($request->get('tags'));

        return redirect("academies/$academy->id/addImages");

    }


    /**
     * Show View to Add Images to particular academy
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addImages($id)
    {
        $academy = Academy::findOrFail($id);

        return view('academies.addimages', compact('academy'));
    }

    /**
     * Save Uploaded Image and attach it to Academy
     * @param                          $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveImages($id, Request $request)
    {

        $file = $request->file('file');

        if($file){

            $photoName = time().$file->getClientOriginalName();

            $file->move(public_path()."/uploads/", $photoName);

            $academy = Academy::findOrFail($id);

            $academy->images()->create(['image_path' => $photoName]);

            return response()->json(['done']);

        }else{
            return response()->json(['invalid File']);
        }
    }

    /**
     * Complete teh Academy creation process
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function complete($id)
    {
        \Alert::success('Great !! Academy Created Successfully');

        return redirect(route('academies.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int                     $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $academy = Academy::findOrFail($id);

        session()->has('first_time') ? '': event(new AcademyViewed($academy, $request->ip())) ;

        session(['first_time' => 'true']);

        return view('academies.show', compact('academy'));
    }

}
