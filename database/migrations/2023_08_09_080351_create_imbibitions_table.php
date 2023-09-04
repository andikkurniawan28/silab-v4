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
        Schema::create('imbibitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->float("totalizer_imb");
            $table->float("flow_imb");
            $table->float("imb_persen_tebu")->nullable();
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
        Schema::dropIfExists('imbibitions');
    }
};
