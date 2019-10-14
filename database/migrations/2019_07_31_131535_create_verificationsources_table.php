<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificationsources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('responsibility');
            $table->string('frequency');
            $table->string('source');
            $table->string('collection_method');
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
        Schema::dropIfExists('verificationsources');
    }
}
