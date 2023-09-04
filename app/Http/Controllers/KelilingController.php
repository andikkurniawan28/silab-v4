<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Keliling;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\KelilingStoreRequest;

class KelilingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $keliling = Keliling::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("keliling.index", compact("config", "keliling"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("keliling.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelilingStoreRequest $request)
    {
        Keliling::create($request->all());
        return redirect()->route("keliling.create")->with("success", "Keliling Proses berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keliling  $keliling
     * @return \Illuminate\Http\Response
     */
    public function show(Keliling $keliling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keliling  $keliling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $keliling = Keliling::whereId($id)->get()->last();
        return view("keliling.edit", compact("config", "keliling"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keliling  $keliling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Keliling::whereId($id)->update($request->except([
            "_token",
            "_method",
            "created_at",
        ]));
        return redirect()->route("keliling.index")->with("success", "Keliling Proses berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keliling  $keliling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keliling::whereId($id)->delete();
        return redirect()->route("keliling.index")->with("success", "Keliling Proses berhasil dihapus.");
    }

}
