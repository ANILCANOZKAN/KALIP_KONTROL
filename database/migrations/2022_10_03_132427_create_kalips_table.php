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
        Schema::create('kalips', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('durum')->nullable();
            $table->string('rafno')->nullable();
            $table->string('gozadedi')->nullable();
            $table->string('agizcapi')->nullable();
            $table->string('ceneyapisi')->nullable();
            $table->string('agirlik')->nullable();
            $table->string('gonderilenyer')->nullable();
            $table->text('aciklama')->nullable();
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
        Schema::dropIfExists('kalips');
    }
};
