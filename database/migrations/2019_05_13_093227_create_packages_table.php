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
            $table->string('sub_title', 255)->nullable();
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->string('location', 255)->nullable();
            $table->decimal('orignal_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('percent_off')->nullable();
            $table->dateTime('sales_end_time')->nullable();
            $table->text('video_embed_code')->nullable();
            $table->text('description')->nullable();
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
