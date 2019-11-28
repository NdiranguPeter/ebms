<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('output_id');
            $table->String('name');
            $table->string('scoring');
            $table->string('unit');
            $table->string('baseline_target');
            $table->string('project_target');
            $table->date('start');
            $table->date('end');
            $table->string('duration');
            $table->string('partners');
            $table->string('person_responsible');
            $table->string('budget');
            $table->integer('currency');
            $table->string('budget_code');
            $table->string('budget_unit');
            $table->string('no_unit');
            $table->string('cost_unit');
            $table->integer('total_beneficiaries');
            $table->integer('total_male');
            $table->integer('total_female');
            $table->integer('indirect_male')->nullable();
            $table->integer('indirect_female')->nullable();
            $table->integer('disabled_male')->nullable();
            $table->integer('disabled_female')->nullable();

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
        Schema::dropIfExists('activities');
    }
}
