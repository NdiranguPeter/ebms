<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonthColumnToIndicatorsafterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicatorafters', function (Blueprint $table) {
              $table->integer('month')->after('end');
              $table->integer('monthly_total')->after('person_responsible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicatorafters', function (Blueprint $table) {
            $table->dropColumn('month');
            $table->dropColumn('monthly_total');
        });
    }
}
