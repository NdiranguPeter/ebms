<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatoraftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicatorafters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('indicator_id');
            $table->string('person_responsible')->nullable();
            $table->string('jan')->nullable();
            $table->string('feb')->nullable();
            $table->string('mar')->nullable();
            $table->string('apr')->nullable();
            $table->string('may')->nullable();
            $table->string('jun')->nullable();
            $table->string('jul')->nullable();
            $table->string('aug')->nullable();
            $table->string('sep')->nullable();
            $table->string('oct')->nullable();
            $table->string('nov')->nullable();
            $table->string('dec')->nullable();
            $table->date('start');
            $table->date('end');
            $table->date('ovi_date');

            $table->string('before_after');
            $table->string('project_target');
            $table->string('baseline_target');
            $table->integer('year');

            $table->timestamps();

            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicatorafters');
    }
}
