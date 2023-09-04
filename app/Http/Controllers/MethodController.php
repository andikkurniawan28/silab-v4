<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Requests\MethodStoreRequest;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $method = Method::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("method.index", compact("config", "method"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("method.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MethodStoreRequest $request)
    {
        Method::create($request->all());
        return redirect()->route("method.index")->with("success", "Metode berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $method = Method::whereId($id)->select(["id", "name"])->get()->last();
        return view("method.edit", compact("config", "method"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Method::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("method.index")->with("success", "Metode berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Method::whereId($id)->delete();
        return redirect()->route("method.index")->with("success", "Metode berhasil dihapus.");
    }
}
