<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_businesses', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_quantity')->nullable();
            $table->text('product_description')->nullable(); 
            $table->string('price')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
            $table->integer('status')->default(1);

            $table->integer('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('village')->nullable();
            $table->string('road')->nullable();
            $table->string('district')->nullable();
            $table->string('police_station')->nullable();
            $table->string('post_office')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();
            $table->text('personal_description')->nullable();

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
        Schema::dropIfExists('my_businesses');
    }
}
