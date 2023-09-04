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
        Schema::create('analisa_khususes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sample_id")->unique()->constrained();
            $table->foreignId("user_id")->constrained();
            $table->float("tsai")->nullable();
            $table->float("optical_density")->nullable();
            $table->float("succrose")->nullable();
            $table->float("glucose")->nullable();
            $table->float("fructose")->nullable();
            $table->float("gula_reduksi")->nullable();
            $table->float("kadar_kapur")->nullable();
            $table->float("kadar_phospat")->nullable();
            $table->float("preparation_index")->nullable();
            $table->float("kadar_sabut")->nullable();
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
        Schema::dropIfExists('analisa_khususes');
    }
};
