<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assumptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integerIncrements('project_id');
            $table->string('goal_id')->nullable;
            $table->string('outcome_id')->nullable;
            $table->string('output_id')->nullable;
            $table->string('activity_id')->nullable;
            $table->string('reason');
            $table->string('validation');
            $table->string('description');
            $table->string('response');
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
        Schema::dropIfExists('assumptions');
    }
}
