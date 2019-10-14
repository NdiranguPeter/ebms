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
            $table->integer('assumption_id');
            $table->string('occur');
            $table->string('impact');
            $table->string('response');
            $table->string('validated');
            $table->string('accessed');
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
