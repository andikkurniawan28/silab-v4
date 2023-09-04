<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $role = Role::select(["id", "name"])->limit(1000)->orderBy("id", "desc")->get();
        return view("role.index", compact("config", "role"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        return view("role.create", compact("config"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        Role::create($request->all());
        return redirect()->route("role.index")->with("success", "Hak akses berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $role = Role::whereId($id)->select(["id", "name"])->get()->last();
        return view("role.edit", compact("config", "role"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Role::whereId($id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route("role.index")->with("success", "Hak akses berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::whereId($id)->delete();
        return redirect()->route("role.index")->with("success", "Hak akses berhasil dihapus.");
    }
}
