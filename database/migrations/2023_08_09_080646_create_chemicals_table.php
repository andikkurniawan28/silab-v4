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
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->float("kapur")->nullable();
            $table->float("belerang")->nullable();
            $table->float("floculant")->nullable();
            $table->float("naoh")->nullable();
            $table->float("b894")->nullable();
            $table->float("b895")->nullable();
            $table->float("b210")->nullable();
            $table->float("blotong")->nullable();
            $table->float("phospat")->nullable();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('chemicals');
    }
};
