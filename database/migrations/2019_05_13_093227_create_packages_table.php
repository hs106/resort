<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->text('sub_title');
            $table->string('slug');
            $table->string('featured_image');
            $table->string('location', 255);
            $table->decimal('orignal_price', 10, 2);
            $table->decimal('price', 10, 2);
            $table->string('percent_off');
            $table->dateTime('sales_end_time');
            $table->text('video_embed_code');
            $table->text('description');
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
        Schema::dropIfExists('packages');
    }
}
