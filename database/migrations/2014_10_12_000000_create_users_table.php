<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name',30);
            $table->string('first_name',30);
            $table->string('middle_name',30)->nullable();
            $table->string('mobile_number',11)->nullable();
            $table->string('position',100)->nullable();
            $table->string('client_name',100);
            $table->string('account_type',1)->default('0');
            $table->string('user_type',1)->default('0');
            $table->string('registration_status',1)->default('0');
            $table->boolean('is_active',1)->default('1');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();

            $table->index(['id', 'name', 'account_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
