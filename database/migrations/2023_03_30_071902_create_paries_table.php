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
        Schema::create('paries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('match_id');
            $table->integer('betteam_id');
            $table->integer('price');
            $table->integer('odds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paries');
    }
};
