<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function create(Festival $festival)
    {
        return view("visitors.create", compact('festival'));
    }

    public function store(Festival $festival)
    {
        request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $visitor = Visitor::where('email', '=', request('email'))->first();

        if($visitor == null) {
            $visitor = new Visitor(request(['first_name', 'last_name', 'email']));
        }
        $visitor->save();

        $visitor->festivals()->attach($festival);

        return redirect()->route('home');
    }
}
