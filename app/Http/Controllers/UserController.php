<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $user = User::orderBy("id", "desc")->get();
        return view("user.index", compact("config", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        $role = Role::where("id", ">", 1)->orderBy("id", "desc")->get();
        return view("user.create", compact("config", "role"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->route("user.index")->with("success", "Pengguna berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $role = Role::where("id", ">", 1)->orderBy("id", "desc")->get();
        $user = User::whereId($id)->get()->last();
        return view("user.edit", compact("config", "user", "role"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::whereId($id)->update($request->except("_token", "_method"));
        return redirect()->route("user.index")->with("success", "Pengguna berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        return redirect()->route("user.index")->with("success", "Pengguna berhasil dihapus.");
    }
}
