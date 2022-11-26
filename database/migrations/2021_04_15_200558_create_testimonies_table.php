<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('type')->nullable()->default(null);
            $table->text('text');
            $table->text('image')->nullable()->default(null);
            $table->string('job')->nullable()->default(null);
            $table->string('note')->nullable()->default(null);
            $table->string('token')->nullable();
            $table->integer('position')->nullable();
            $table->integer('active')->nullable()->default(null);
            $table->integer('client')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonies');
    }
}
