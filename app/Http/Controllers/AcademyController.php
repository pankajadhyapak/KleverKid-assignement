<?php

namespace App\Http\Controllers;

use App\Academy;
use App\Events\AcademyViewed;
use App\Http\Requests\NewAcademy;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $academies = Academy::with('tags','images')->get();

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

    public function addImages($id)
    {
        $academy = Academy::findOrFail($id);
        return view('academies.addimages', compact('academy'));
    }

    public function saveImages($id, Request $request)
    {

        $file = $request->file('file');

        $photoName = time().$file->getClientOriginalName();

        $file->move(public_path()."/uploads/", $photoName);

        $academy = Academy::findOrFail($id);
        $academy->images()->create(['image_path' => $photoName]);

        return response()->json(['done']);
    }

    public function complete($id)
    {
        \Alert::success('Great !! Academy Created Successfully');

        return redirect(route('academies.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $academy = Academy::findOrFail($id);

        event(new AcademyViewed($academy, $request));

        return view('academies.show', compact('academy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
