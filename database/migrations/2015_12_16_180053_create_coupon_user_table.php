<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('coupon_user', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        # `coupon_id` and `user_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `coupon_id` will reference the `coupons table` and `user_id` will reference the `users` table.
        $table->integer('coupon_id')->unsigned();
        $table->integer('user_id')->unsigned();

        # Make foreign keys
        $table->foreign('coupon_id')->references('id')->on('coupons');
        $table->foreign('user_id')->references('id')->on('users');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('coupon_user');
    }
}
