<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $config = Config::run();
        return view("home.index", compact("config"));
    }
}
