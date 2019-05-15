<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->text('sub_title')->nullable()->change();
            $table->string('featured_image')->nullable()->change();
            $table->string('location', 255)->nullable()->change();
            $table->decimal('orignal_price', 10, 2)->nullable()->change();
            $table->decimal('price', 10, 2)->nullable()->change();
            $table->string('percent_off')->nullable()->change();
            $table->dateTime('sales_end_time')->nullable()->change();
            $table->text('video_embed_code')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('hotel_details')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
