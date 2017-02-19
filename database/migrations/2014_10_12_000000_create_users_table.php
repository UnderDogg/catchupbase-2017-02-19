<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id')->unsigned();
            $table->unsignedInteger('company_id')->index();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password', 60)->nullable();
            $table->string('confirmation_code')->nullable();
            $table->boolean('isregistered')->default(false);
            $table->boolean('isconfirmed')->default(config('access.users.confirm_email') ? false : true);
            $table->integer('theme_id')->nullable();
            $table->boolean('notify_sent')->default(true);
            $table->boolean('notify_viewed')->default(false);
            $table->boolean('notify_paid')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Remove Foreign/Unique/Index
         */
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
        });

        Schema::drop('users');
    }
}
