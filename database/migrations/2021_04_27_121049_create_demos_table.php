<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->string('title_en')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->text('text_en')->nullable()->default(null);
            $table->string('category')->nullable()->default(null);
            $table->string('category_en')->nullable()->default(null);
            $table->string('link')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->string('target')->nullable()->default("_blank");
            $table->integer('active')->nullable()->default(null);
            $table->integer('position')->nullable()->default(null);
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
        Schema::dropIfExists('demos');
    }
}
