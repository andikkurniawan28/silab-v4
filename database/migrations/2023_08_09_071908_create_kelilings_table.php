<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelilings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            for($i=1; $i<=9; $i++){
                $table->float("hampa_udara_evap{$i}")->nullable();
            }
            for($i=1; $i<=18; $i++){
                $table->float("hampa_udara_pan_masakan{$i}")->nullable();
            }
            $table->float("pompa_vakum_evap")->nullable();
            $table->float("pompa_vakum_masakan")->nullable();
            for($i=1; $i<=3; $i++){
                $table->float("suhu_pemanas{$i}")->nullable();
            }
            $table->float("suhu_ne_stc")->nullable();
            $table->float("suhu_air_terjun")->nullable();
            $table->float("suhu_air_injeksi")->nullable();
            $table->float("volume_clear_liquor")->nullable();
            $table->float("volume_nk_sebelum_sulfitasi")->nullable();
            $table->float("volume_nk_setelah_sulfitasi_atas")->nullable();
            $table->float("volume_nk_setelah_sulfitasi_bawah")->nullable();
            $table->float("volume_r1_mol_atas")->nullable();
            $table->float("volume_r1_mol_bawah")->nullable();
            $table->float("volume_r2_mol_atas")->nullable();
            $table->float("volume_r2_mol_bawah")->nullable();
            $table->float("volume_stroop_a_atas")->nullable();
            $table->float("volume_stroop_a_bawah")->nullable();
            $table->float("volume_stroop_c_atas")->nullable();
            $table->float("volume_stroop_c_bawah")->nullable();
            $table->float("volume_klare_d_atas")->nullable();
            $table->float("volume_klare_d_bawah")->nullable();
            $table->float("volume_einwuurf_c")->nullable();
            $table->float("volume_einwuurf_d")->nullable();
            for($i=1; $i<=11; $i++){
                $table->float("volume_palung{$i}")->nullable();
            }
            $table->float("volume_cvp_c")->nullable();
            $table->float("volume_cvp_d")->nullable();
            $table->float("tekanan_uap_tinggi")->nullable();
            $table->float("tekanan_uap_rendah")->nullable();
            $table->float("tekanan_uap_bekas")->nullable();
            $table->timestamp('created_at')->useCurrent()->unique();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelilings');
    }
};
