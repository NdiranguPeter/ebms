<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityaftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activityafters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('activity_id');
            $table->integer('total_beneficiaries');
            $table->integer('total_male');
            $table->integer('total_female');
            $table->string('budget');
            $table->string('budget_diff');
            $table->string('person_responsible');
            $table->string('duration');
            $table->integer('months');
            $table->integer('zero_two_male');
            $table->integer('three_five_male');
            $table->integer('six_twelve_male');
            $table->integer('thirteen_seventeen_male');
            $table->integer('eigteen_twentyfive_male');
            $table->integer('twentysix_fourtynine_male');
            $table->integer('fifty_fiftynine_male');
            $table->integer('sixty_sixtynine_male');
            $table->integer('seventy_seventynine_male');
            $table->integer('above_eighty_male');
            $table->integer('zero_two_female');
            $table->integer('three_five_female');
            $table->integer('six_twelve_female');
            $table->integer('thirteen_seventeen_female');
            $table->integer('eigteen_twentyfive_female');
            $table->integer('twentysix_fourtynine_female');
            $table->integer('fifty_fiftynine_female');
            $table->integer('sixty_sixtynine_female');
            $table->integer('seventy_seventynine_female');
            $table->integer('above_eighty_female');
            $table->integer('indirect_male');
            $table->integer('indirect_female');

            $table->date('start');
            $table->date('end');

            $table->string('before_after');
            $table->integer('year');

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
        Schema::dropIfExists('activityafters');
    }
}
