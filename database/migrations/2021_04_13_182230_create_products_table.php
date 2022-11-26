<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Package;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable()->default(null);
            $table->integer('active')->default(1);
            $table->integer('pwa')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('token')->nullable()->default(null);
            $table->string('price')->nullable()->default(null);
            $table->text('datas')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
            $table->timestamps();
            $table->datetime('date_online')->nullable()->default(null);
            $table->datetime('date_limit')->nullable()->default(null);
            $table->datetime('date_paid')->nullable()->default(null);
            $table->datetime('deleted_at')->nullable()->default(null);
            $table->integer('user_id')->nullable()->default(null);
            $table->foreignId('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
