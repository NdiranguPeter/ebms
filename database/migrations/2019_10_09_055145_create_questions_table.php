<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->unsignedBigInteger('group_id');
            $table->longText('name');
            $table->string('type');
            $table->integer('qn_order');
            $table->string('mandatory');
            $table->string('column');
            $table->string('hint')->nullable();
            $table->string('default')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
