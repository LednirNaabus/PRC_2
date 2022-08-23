<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomAnswerToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('option_1',60)->default('')->after('question');
            $table->string('option_2',60)->default('')->after('option_1');
            $table->string('option_3',60)->default('')->after('option_2');
            $table->string('option_4',60)->default('')->after('option_3');
            $table->integer('score_1')->default(0)->after('option_4');
            $table->integer('score_2')->default(0)->after('score_1');
            $table->integer('score_3')->default(0)->after('score_2');
            $table->integer('score_4')->default(0)->after('score_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
}
