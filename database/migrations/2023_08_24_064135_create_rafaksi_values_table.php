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
        Schema::create('rafaksi_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->float("daduk");
            $table->float("akar");
            $table->float("tali_pucuk");
            $table->float("sogolan");
            $table->float("pucuk");
            $table->float("tebu_muda");
            $table->float("lelesan");
            $table->float("terbakar");
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
        Schema::dropIfExists('rafaksi_values');
    }
};
