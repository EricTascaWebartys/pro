<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname')->nullable()->default(null);
            $table->string('lastname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('phone_fix')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('siret')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('zip')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('welcome')->nullable()->default(null);
            $table->string('days')->nullable()->default(null);
            $table->string('hours')->nullable()->default(null);
            $table->string('job')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
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
        Schema::dropIfExists('information');
    }
}
