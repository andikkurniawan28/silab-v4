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
        Schema::create('analisa_umums', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sample_id")->unique()->constrained();
            $table->foreignId("user_id")->constrained();
            $table->float("cao")->nullable();
            $table->float("ph")->nullable();
            $table->float("turbidity")->nullable();
            $table->float("suhu")->nullable();
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
        Schema::dropIfExists('analisa_umums');
    }
};
