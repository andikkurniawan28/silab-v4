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
        Schema::create('analisa_posbrixes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("posbrix_id")->constrained();
            $table->foreignId("kawalan_id")->constrained();
            $table->foreignId("variety_id")->constrained();
            $table->foreignId("status_id")->constrained();
            $table->foreignId("kud_id")->nullable()->constrained();
            $table->foreignId("pospantau_id")->nullable()->constrained();
            $table->foreignId("wilayah_id")->nullable()->constrained();
            $table->string("petani")->nullable();
            $table->string("spta")->unique();
            $table->integer("brix");
            $table->string("barcode_antrian")->unique()->nullable();
            $table->string("register")->nullable();
            $table->string("nopol")->nullable();
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
        Schema::dropIfExists('analisa_posbrixes');
    }
};
