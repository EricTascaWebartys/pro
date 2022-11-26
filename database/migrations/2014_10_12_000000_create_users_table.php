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
            $table->string('firstname')->nullable()->default(null);
            $table->string('lastname')->nullable()->default(null)->nullable()->default(null);
            $table->string('role')->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable()->default(null);
            $table->string('phone_home')->nullable()->default(null);
            $table->string('fax_number')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('zip')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('token')->nullable()->default(null);
            $table->string('token_connection')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->text('datas')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('siret')->nullable()->default(null);
            $table->integer('gender')->nullable()->default(null);
            $table->string('company')->nullable()->default(null);
            $table->string('client_id')->nullable()->default(null);
            $table->string('client_number')->nullable()->default(null);
            $table->integer('active')->nullable()->default(1);
            $table->string('reset')->nullable()->default(null);
            $table->integer('is_connected')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
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
