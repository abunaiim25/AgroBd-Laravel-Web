<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_controls', function (Blueprint $table) {
            $table->id();

            $table->string('logo_big')->nullable();
            $table->string('logo_small')->nullable();
            
            $table->string('home_bg_img')->nullable();
            $table->string('home_bg_txt1')->nullable();
            $table->string('home_bg_txt2')->nullable();
            $table->string('home_bg_txt3')->nullable();

            $table->string('home_new_txt1')->nullable();
            $table->string('home_new_txt2')->nullable();
            $table->string('home_new_txt3')->nullable();
            $table->string('home_new_txt1_img')->nullable();
            $table->string('home_new_txt2_img')->nullable();
            $table->string('home_new_txt3_img')->nullable();
            
            $table->string('home_banner_img')->nullable();
            $table->string('home_banner_txt1')->nullable();
            $table->string('home_banner_txt2')->nullable();

            $table->string('shop_banner_img')->nullable();
            $table->string('shop_banner_txt1')->nullable();
            $table->string('shop_banner_txt2')->nullable();

            $table->string('about_banner_img')->nullable();

            $table->string('contact_banner_img')->nullable();

            $table->string('myorder_banner_img')->nullable();
            $table->string('myorder_banner_txt1')->nullable();
            $table->string('myorder_banner_txt2')->nullable();

            $table->text('footer_text')->nullable();
            $table->string('footer_contact_address')->nullable();
            $table->string('footer_contact_phone')->nullable();
            $table->string('footer_contact_email')->nullable();
            $table->string('footer_iteam_img_1')->nullable();
            $table->string('footer_iteam_img_2')->nullable();
            $table->string('footer_iteam_img_3')->nullable();
            $table->string('footer_iteam_img_4')->nullable();
            $table->string('footer_iteam_img_5')->nullable();
            $table->string('footer_iteam_img_6')->nullable();
            $table->string('footer_social_fb')->nullable();
            $table->string('footer_social_twitter')->nullable();
            $table->string('footer_social_linkedin')->nullable();
            $table->string('footer_social_insta')->nullable();

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
        Schema::dropIfExists('front_controls');
    }
}
