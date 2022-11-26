<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->integer('active')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('token')->nullable()->default(null);
            $table->string('price')->nullable()->default(null);
            $table->text('datas')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
