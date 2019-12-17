<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDisabledColumnToActivityaftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activityafters', function (Blueprint $table) {
            $table->integer('disabled_male')->after('indirect_female')->nullable();
            $table->integer('disabled_female')->after('indirect_female')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activityafters', function (Blueprint $table) {
             $table->dropColumn('disabled_male');
             $table->dropColumn('disabled_male');
        });
    }
}
