<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardfieldsToBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('credit_card_number')->nullable()->after('zip_code');
            $table->string('credit_card_cvv')->nullable()->after('credit_card_number');
            $table->string('credit_card_month')->nullable()->after('credit_card_cvv');
            $table->string('credit_card_year')->nullable()->after('credit_card_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
