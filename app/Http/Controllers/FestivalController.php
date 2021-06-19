<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::all();

        return view('festivals.index', compact('festivals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("festivals.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'image' => 'required|max:255|image'
        ]);

        $imagePath = $this->resizeImage($request);
        $data['image'] = $imagePath;

        Festival::create($data);

        session()->flash('success', 'Festival created successfully');

        return redirect()->route("festivals.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Festival $festival)
    {
        return view("festivals.edit", compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Festival $festival)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'image' => ''
        ]);

        $imagePath = $festival->image;

        if(!empty($request->image)) {
            $imagePath = $this->resizeImage($request);
        }

        $data['image'] = $imagePath;

        $festival->update($data);

        session()->flash('success', 'Festival updated successfully');

        return redirect()->route("festivals.index");
    }

    private function resizeImage(Request $request)
    {
        $imagePath = $request->image->store('images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        return $imagePath;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect()->route("festivals.index");
    }
}
