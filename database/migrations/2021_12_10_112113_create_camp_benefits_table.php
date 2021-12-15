<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCampBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();

            // cara relasi 1
            // $table->unsignedBigInteger('camp_id');

            // cara relasi 2
            $table->foreignId('camp_id')->constrained();

            // cara relasi 1
            // $table->foreign('camp_id')->references('id')->on('camp')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('camp_benefits');
    }
}
