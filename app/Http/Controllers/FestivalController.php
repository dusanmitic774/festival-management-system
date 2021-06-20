<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FestivalController extends Controller
{
    public function index()
    {
        $festivals = Festival::with("visitors")->paginate(10);

        return view('festivals.index', compact('festivals'));
    }

    public function show(Festival $festival)
    {
        return view("festivals.show", compact('festival'));
    }

    public function create()
    {
        return view("festivals.create");
    }

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
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required|max:255|image'
        ]);

        $imagePath = $this->resizeImage($request);
        $data['image'] = $imagePath;

        Festival::create($data);

        session()->flash('success', 'Festival created successfully');

        return redirect()->route("festivals.index");
    }

    public function edit(Festival $festival)
    {
        return view("festivals.edit", compact('festival'));
    }

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
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => ''
        ]);

        $imagePath = $festival->image;

        if (!empty($request->image)) {
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

    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect()->route("festivals.index");
    }
}
