<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('irw_pin')->nullable();
            $table->date('start');
            $table->date('end');
            $table->string('donors');
            $table->string('stage');
            $table->string('type');
            $table->string('sector')->nullable();
            $table->string('sector_split')->nullable();
            $table->string('global_goal')->nullable();
            $table->string('globalgoal_split')->nullable();
            $table->string('sdg')->nullable();
            $table->string('sdg_split')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('irw_pin');
            $table->dropColumn('start');
            $table->dropColumn('end');
            $table->dropColumn('donors');
            $table->dropColumn('stage');
            $table->dropColumn('type');
            $table->dropColumn('sector');
            $table->string('sector_split');
            $table->string('global_goal');
            $table->string('globalgoal_split');
            $table->string('sdg');
            $table->string('sdg_split');

        });
    }
}
