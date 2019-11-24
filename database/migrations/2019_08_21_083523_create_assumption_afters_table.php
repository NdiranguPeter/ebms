<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssumptionAftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assumption_afters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assumption_id')->nullable();
            $table->string('occur')->nullable();
            $table->string('impact')->nullable();
            $table->string('response')->nullable();
            $table->string('validated')->nullable();
            $table->string('accessed')->nullable();
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
        Schema::dropIfExists('assumption_afters');
    }
}
