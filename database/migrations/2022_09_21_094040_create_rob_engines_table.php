<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRobEnginesTable extends Migration
{
    public function up()
    {
        Schema::create('rob_engines', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rob_engines');
    }
}
