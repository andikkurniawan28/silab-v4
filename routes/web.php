<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KudController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaktorController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\OnFarmController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SuksesController;
use App\Http\Controllers\AriCardController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\KawalanController;
use App\Http\Controllers\MollaseController;
use App\Http\Controllers\PosbrixController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TimbangController;
use App\Http\Controllers\VarietyController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\CariDataController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\CoreCardController;
use App\Http\Controllers\KartuAriController;
use App\Http\Controllers\KelilingController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MoistureController;
use App\Http\Controllers\ColoromatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KartuCoreController;
use App\Http\Controllers\PospantauController;
use App\Http\Controllers\AnalisaAriController;
use App\Http\Controllers\ImbibitionController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\AnalisaCoreController;
use App\Http\Controllers\AnalisaLainController;
use App\Http\Controllers\AnalisaUmumController;
use App\Http\Controllers\AriSamplingController;
use App\Http\Controllers\CetakRonselController;
use App\Http\Controllers\SaccharomatController;
use App\Http\Controllers\AnalisaAmpasController;
use App\Http\Controllers\AnalisaKetelController;
use App\Http\Controllers\CoreSamplingController;
use App\Http\Controllers\RafaksiValueController;
use App\Http\Controllers\AnalisaKhususController;
use App\Http\Controllers\InputMoistureController;
use App\Http\Controllers\LaporanMandorController;
use App\Http\Controllers\RawsugarinputController;
use App\Http\Controllers\ReportOffFarmController;
use App\Http\Controllers\AnalisaBlotongController;
use App\Http\Controllers\AnalisaPosbrixController;
use App\Http\Controllers\AnalisaSulphurController;
use App\Http\Controllers\RawsugaroutputController;
use App\Http\Controllers\KoreksiRendemenController;
use App\Http\Controllers\KoreksiTimbanganController;
use App\Http\Controllers\MonitoringOnFarmController;
use App\Http\Controllers\RendemenNppAcuanController;
use App\Http\Controllers\AnalisaCoreSampleController;
use App\Http\Controllers\LaporanMandorOnFarmController;
use App\Http\Controllers\CetakBarcodeByCategoryController;

// Auth
Route::get("login", [AuthController::class, "login"])->name("login");
Route::get("register", [AuthController::class, "register"])->name("register");
Route::get("change_password", [AuthController::class, "changePassword"])->name("change_password");
Route::post("login", [AuthController::class, "loginProcess"])->name("login.process");
Route::post("register", [AuthController::class, "registerProcess"])->name("register.process");
Route::post("change_password", [AuthController::class, "changePasswordProcess"])->name("change_password.process");
Route::get("logout", [AuthController::class, "logout"])->name("logout");
Route::get("select_date", [AuthController::class, "selectDate"])->name("select_date")->middleware(["auth"]);;
Route::post("select_date", [AuthController::class, "selectDateProcess"])->name("select_date.process")->middleware(["auth"]);

// Home & Dashboard
Route::get("/", HomeController::class)->name("home")->middleware(["auth"]);
Route::get("dashboard", DashboardController::class)->name("dashboard")->middleware(["auth", "date_is_stated"]);

// Monitoring
Route::get("monitoring-perstation/{station_id}", [MonitoringController::class, "perStation"])->name("monitoring.perStation")->middleware(["auth", "date_is_stated"]);
Route::get("monitoring-permaterial/{material_id}", [MonitoringController::class, "perMaterial"])->name("monitoring.perMaterial")->middleware(["auth", "date_is_stated"]);
Route::get("monitoring-onfarm/{station_id}", [MonitoringOnFarmController::class, "index"])->name("monitoring.onfarm")->middleware(["auth", "date_is_stated"]);

// Off Farm
Route::resource("role", RoleController::class)->middleware(["auth", "user_is_admin"]);
Route::resource("user", UserController::class)->middleware(["auth", "user_is_admin"]);
Route::resource("station", StationController::class)->middleware(["auth", "user_is_off_farm"]);
Route::resource("method", MethodController::class)->middleware(["auth", "user_is_off_farm"]);
Route::resource("material", MaterialController::class)->middleware(["auth", "user_is_off_farm"]);
Route::resource("sample", SampleController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("saccharomat", SaccharomatController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("coloromat", ColoromatController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("moisture", MoistureController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_ampas", AnalisaAmpasController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_blotong", AnalisaBlotongController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_ketel", AnalisaKetelController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_umum", AnalisaUmumController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_khusus", AnalisaKhususController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_sulphur", AnalisaSulphurController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("analisa_lain", AnalisaLainController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("balance", BalanceController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("imbibition", ImbibitionController::class)->middleware(["auth", "date_is_stated", "user_is_non_qc"]);
Route::resource("keliling", KelilingController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("chemical", ChemicalController::class)->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::resource("mollases", MollaseController::class)->middleware(["auth", "date_is_stated", "user_is_staff"]);
Route::resource("rawsugarinputs", RawsugarinputController::class)->middleware(["auth", "date_is_stated", "user_is_staff"]);
Route::resource("rawsugaroutputs", RawsugaroutputController::class)->middleware(["auth", "date_is_stated", "user_is_staff"]);
Route::get("cetak_barcode/{station_id}", [CetakBarcodeByCategoryController::class, "index"])->name("cetak_barcode")->middleware(["auth", "user_is_off_farm"]);
Route::post("cetak_barcode", [CetakBarcodeByCategoryController::class, "store"])->name("cetak_barcode.store")->middleware(["auth", "user_is_off_farm"]);
Route::get("cetak_ronsel", [CetakRonselController::class, "index"])->name("cetak_ronsel")->middleware(["auth", "user_is_non_qc"]);
Route::post("cetak_ronsel", [CetakRonselController::class, "store"])->name("cetak_ronsel.store")->middleware(["auth", "user_is_non_qc"]);
Route::get("koreksi_timbangan", [KoreksiTimbanganController::class, "index"])->name("koreksi_timbangan")->middleware(["auth", "user_is_staff"]);
Route::post("koreksi_timbangan", [KoreksiTimbanganController::class, "process"])->name("koreksi_timbangan.process")->middleware(["auth", "user_is_staff"]);

// On Farm
Route::resource("posbrix", PosbrixController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("kawalan", KawalanController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("variety", VarietyController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("status", StatusController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("core", CoreController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("timbang", TimbangController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("kud", KudController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("pospantau", PospantauController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("wilayah", WilayahController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("analisa_posbrix", AnalisaPosbrixController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("core_card", CoreCardController::class)->middleware(["auth", "user_is_on_farm"]);
Route::resource("core_sampling", CoreSamplingController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("analisa_core", AnalisaCoreController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("ari_card", AriCardController::class)->middleware(["auth", "user_is_on_farm"]);
Route::resource("ari_sampling", AriSamplingController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("analisa_ari", AnalisaAriController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("scoring", ScoringController::class)->middleware(["auth", "date_is_stated", "user_is_on_farm"]);
Route::resource("rendemen_npp_acuan", RendemenNppAcuanController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("rafaksi_value", RafaksiValueController::class)->middleware(["auth", "user_is_staff"]);
Route::resource("faktor", FaktorController::class)->middleware(["auth", "user_is_staff"]);
Route::resource('kartu_core', KartuCoreController::class)->middleware(["auth", "user_is_on_farm"]);
Route::resource('kartu_ari', KartuAriController::class)->middleware(["auth", "user_is_on_farm"]);
Route::get("cari_data", [CariDataController::class, "index"])->name("cari_data")->middleware(["auth", "user_is_on_farm"]);
Route::post("cari_data", [CariDataController::class, "process"])->name("cari_data.process")->middleware(["auth", "user_is_on_farm"]);
Route::get("analisa_posbrix/create/{posbrix_id}", [OnFarmController::class, "analisaPosbrix"])->name("on_farm.analisa_posbrix")->middleware(["auth", "user_is_on_farm"]);
Route::get("core_sampling/create/{core_id}", [OnFarmController::class, "coreSampling"])->name("on_farm.core_sampling")->middleware(["auth", "user_is_on_farm"]);
Route::get("ari_sampling/create/{timbang_id}", [OnFarmController::class, "ariSampling"])->name("on_farm.ari_sampling")->middleware(["auth", "user_is_on_farm"]);
Route::get("koreksi_rendemen", [KoreksiRendemenController::class, "index"])->name("koreksi_rendemen")->middleware(["auth", "user_is_staff"]);
Route::post("koreksi_rendemen", [KoreksiRendemenController::class, "process"])->name("koreksi_rendemen.process")->middleware(["auth", "user_is_staff"]);

// Report
Route::get("report_off_farm", [ReportOffFarmController::class, "index"])->name("report_off_farm")->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::get("laporan_mandor/{shift}", [LaporanMandorController::class, "index"])->name("laporan_mandor")->middleware(["auth", "date_is_stated", "user_is_off_farm"]);
Route::get("laporan_mandor_on_farm/{shift}", [LaporanMandorOnFarmController::class, "index"])->name("laporan_mandor_on_farm")->middleware(["auth", "date_is_stated", "user_is_on_farm"]);

// API PDE
Route::get("aplikasi/get_antrian/{barcode_antrian}", [AplikasiController::class, "getAntrian"])->name("aplikasi.get_antrian")->middleware(["auth", "user_is_admin"]);
Route::get("aplikasi/get_rfid/{rfid}", [AplikasiController::class, "getRfid"])->name("aplikasi.get_rfid")->middleware(["auth", "user_is_admin"]);
