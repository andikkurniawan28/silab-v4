<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Home;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $data = Home::run();
        return view("dashboard.index", compact("config", "data"));
        // return $data;
    }
}
