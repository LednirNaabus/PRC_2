<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('address')->nullable();
            $table->string('zip',5)->nullable();
            $table->string('sss',15)->nullable();
            $table->string('phic',15)->nullable();
            $table->string('hdmf',15)->nullable();
            $table->string('tin',15)->nullable();
            $table->string('rdo',10)->nullable();
            $table->string('employer_type',1)->nullable();
            $table->string('hdmf_code',1)->nullable();
            $table->string('contact_person',100)->nullable();
            $table->string('telephone_number',100)->nullable();
            $table->string('fax_number',100)->nullable();
            $table->string('mobile_number',100)->nullable();
            $table->text('email')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
