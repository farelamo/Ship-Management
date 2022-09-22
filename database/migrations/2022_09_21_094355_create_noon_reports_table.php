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
            $table->text('noon_desc');
            $table->text('passage_plan');
            $table->text('engine');
            $table->text('current_rob');
            $table->text('consumption_rate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noon_posisions');
    }
}
