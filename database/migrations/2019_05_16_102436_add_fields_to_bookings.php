<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('reservation_date')->nullable()->after('package_id');
            $table->tinyInteger('payment_status')->default(0)->nullable()->after('reservation_date');
            $table->string('auth_code')->nullable()->after('payment_status');
            $table->string('transaction_id')->nullable()->after('auth_code');
            $table->string('account_type')->nullable()->after('transaction_id');
            $table->string('address')->nullable()->after('account_type');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->string('zip_code')->nullable()->after('country');
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
