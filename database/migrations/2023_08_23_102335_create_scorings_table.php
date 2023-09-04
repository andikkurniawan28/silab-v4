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
        Schema::create('scorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("analisa_posbrix_id")->unique()->constrained();
            $table->integer("meja_tebu");
            $table->float("daduk")->nullable();
            $table->float("akar")->nullable();
            $table->float("tali_pucuk")->nullable();
            $table->float("sogolan")->nullable();
            $table->float("pucuk")->nullable();
            $table->float("tebu_muda")->nullable();
            $table->float("lelesan")->nullable();
            $table->float("terbakar")->nullable();
            $table->float("rafaksi_mbs");
            $table->float("rendemen_ari");
            $table->float("delta_thd_npp");
            $table->float("rafaksi_ari");
            $table->float("score");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scorings');
    }
};
