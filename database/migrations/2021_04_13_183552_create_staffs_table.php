<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job')->nullable()->default(null);
            $table->string('job_en')->nullable()->default(null);
            $table->string('link_1')->nullable()->default(null);
            $table->string('link_2')->nullable()->default(null);
            $table->string('link_3')->nullable()->default(null);
            $table->string('link_4')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->string('position')->nullable()->default(null);
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
        Schema::dropIfExists('staffs');
    }
}
