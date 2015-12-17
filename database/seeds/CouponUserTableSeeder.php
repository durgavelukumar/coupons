<?php

use Illuminate\Database\Seeder;

class CouponUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		# First, create an array of all the books we want to associate tags with
    # The *key* will be the book title, and the *value* will be an array of tags.
    $coupons =[
        '1' => ['jill@harvard.edu','jamal@harvard.edu'],
        '2' => ['jill@harvard.edu'],
        '3' => ['jamal@harvard.edu'],
		'4' => ['jamal@harvard.edu']
    ];

    # Now loop through the above array, creating a new pivot for each book to tag
    foreach($coupons as $id => $emails) {

        # First get the book
        $coupon = \App\Coupon::where('id','=',$id)->first();

        # Now loop through each tag for this book, adding the pivot
        foreach($emails as $email) {
            $user = \App\User::where('email','LIKE',$email)->first();

            # Connect this tag to this book
            $coupon->users()->save($user);
        }

    }
    }
}
