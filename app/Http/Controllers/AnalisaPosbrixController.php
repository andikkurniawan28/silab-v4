<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Status;
use App\Models\Kawalan;
use App\Models\Posbrix;
use App\Models\Variety;
use App\Models\Material;
use App\Models\CoreSampling;
use Illuminate\Http\Request;
use App\Models\AnalisaPosbrix;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CoreSamplingController;
use App\Http\Requests\AnalisaPosbrixStoreRequest;

class AnalisaPosbrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::run();
        $posbrix = Posbrix::select(["id", "name"])->get();
        $analisa_posbrix = AnalisaPosbrix::where("created_at", ">=", Session::get("time_start"))
            ->where("created_at", "<", Session::get("time_end"))
            ->orderBy("id", "desc")->get();
        return view("analisa_posbrix.index", compact("config", "posbrix", "analisa_posbrix"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config = Config::run();
        $posbrix = Posbrix::all();
        $kawalan = Kawalan::all();
        $variety = Variety::all();
        $status = Status::all();
        return view("analisa_posbrix.create", compact("config", "posbrix", "kawalan", "variety", "status"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnalisaPosbrixStoreRequest $request)
    {
        if($request->posbrix_id != 4){
            AnalisaPosbrix::create($request->all());
            return redirect()->back()->with("success", "Analisa Posbrix berhasil disimpan.");
        } else {
            $count_card = CoreSamplingController::countCard();
            if($count_card > 0){
                AnalisaPosbrix::create($request->all());
                self::createCoreSampling($request);
                return redirect()->back()->with("success", "Analisa Posbrix & Core Sample berhasil disimpan.");
            } else {
                return redirect()->back()->with("success", "Error : Kartu tidak ready!");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaPosbrix  $analisa_posbrix
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaPosbrix $analisa_posbrix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaPosbrix  $analisa_posbrix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::run();
        $analisa_posbrix = AnalisaPosbrix::whereId($id)->get()->last();
        $posbrix = Posbrix::all();
        $kawalan = Kawalan::all();
        $variety = Variety::all();
        $status = Status::all();
        return view("analisa_posbrix.edit", compact("config", "analisa_posbrix", "posbrix", "kawalan", "variety", "status"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaPosbrix  $analisa_posbrix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaPosbrix::whereId($id)->update($request->except([
            "_method", "_token",
        ]));
        return redirect()->route("analisa_posbrix.index")->with("success", "Analisa Posbrix berhasil dirubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaPosbrix  $analisa_posbrix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaPosbrix::whereId($id)->delete();
        return redirect()->route("analisa_posbrix.index")->with("success", "Analisa Posbrix berhasil dihapus.");
    }

    public static function createCoreSampling($request){
        $id = AnalisaPosbrix::where("spta", $request->spta)->get()->last()->id ?? NULL;
        $card = CoreSamplingController::getCardFifo();
        CoreSamplingController::save2($id, $card, $request);
        CoreSamplingController::clear($card);
    }
}
