<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuksesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($route)
    {
        return view("sukses", compact("route"));
    }
}
