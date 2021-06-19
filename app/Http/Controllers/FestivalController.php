<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function create()
    {
        return view("create");
    }
}
