<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->string('goal_id')->nullable;
            $table->string('outcome_id')->nullable;
            $table->string('output_id')->nullable;
            $table->string('activity_id')->nullable;
            $table->string('category');
            $table->string('level');
            $table->string('likelihood');
            $table->string('impact');
            $table->string('description');
            $table->string('response');
            $table->string('strategy');
            $table->string('owner');
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
        Schema::dropIfExists('risks');
    }
}
