<?php

namespace App\Http\Controllers;

use App\Element;

class ElementController extends Controller
{
    public function __invoke()
    {
        return Element::all();
    }
}