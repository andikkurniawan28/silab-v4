<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Material;
use App\Models\Coloromat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ColoromatStoreRequest;

class ColoromatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $coloromat = Coloromat::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("coloromat.index", compact("config", "coloromat"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("coloromat.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColoromatStoreRequest $request)
    {
        Coloromat::create($request->all());
        return redirect()->route("coloromat.create")->with("success", "Coloromat berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function show(Coloromat $coloromat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $coloromat = Coloromat::whereId($id)->get()->last();
        return view("coloromat.edit", compact("config", "coloromat"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Coloromat::whereId($id)->update([
            "sample_id" => $request->sample_id,
            "icumsa" => $request->icumsa,
        ]);
        return redirect()->route("coloromat.index")->with("success", "Coloromat berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coloromat::whereId($id)->delete();
        return redirect()->route("coloromat.index")->with("success", "Coloromat berhasil dihapus.");
    }
}
