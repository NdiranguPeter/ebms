<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIOrderColumnOnIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('indicators', function (Blueprint $table) {
    $table->integer('i_order')->after('project_target')->nullable();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('indicators', function (Blueprint $table) {
          $table->dropColumn('i_order');

        });
    }
}
