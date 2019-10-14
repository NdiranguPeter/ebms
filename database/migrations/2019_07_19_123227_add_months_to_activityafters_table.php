<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonthsToActivityaftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activityafters', function (Blueprint $table) {

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
            $table->dropColumn('jan');
            $table->dropColumn('feb');
            $table->dropColumn('mar');
            $table->dropColumn('apr');
            $table->dropColumn('may');
            $table->dropColumn('jun');
            $table->dropColumn('jul');
            $table->dropColumn('aug');
            $table->dropColumn('sep');
            $table->dropColumn('oct');
            $table->dropColumn('nov');
            $table->dropColumn('dec');

        });
    }
}
