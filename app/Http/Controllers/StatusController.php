<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Config;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $status = Status::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("status.index", compact("config", "status"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("status.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Status::create($request->all());
        return redirect()->route("status.index")->with("success", "Titik Status berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $status = Status::whereId($id)->select(["id", "name"])->get()->last();
        return view("status.edit", compact("config", "status"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Status::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("status.index")->with("success", "Titik Status berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::whereId($id)->delete();
        return redirect()->route("status.index")->with("success", "Titik Status berhasil dihapus.");
    }
}
