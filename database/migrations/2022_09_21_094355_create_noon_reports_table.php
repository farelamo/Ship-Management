<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoonReportsTable extends Migration
{
    public function up()
    {
        Schema::create('noon_reports', function (Blueprint $table) {
            $table->id();
            $table->text('noon_desc')->nullable();
            $table->text('passage_plan')->nullable();
            $table->text('engine')->nullable();
            $table->text('current_rob')->nullable();
            $table->text('consumption_rate')->nullable();
            $table->boolean('empty_desc')->nullable();
            $table->boolean('empty_passage')->nullable();
            $table->boolean('empty_engine')->nullable();
            $table->boolean('empty_current')->nullable();
            $table->boolean('empty_consumption')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noon_posisions');
    }
}
