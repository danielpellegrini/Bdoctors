<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use Carbon\Carbon;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = Carbon::now();


        $sponsors = [

                ['type'=> 'Standard',
                'price'=> 2.99,
                'duration'=> 24],

                ['type'=> 'Premium',
                'price'=> 5.99,
                'duration'=> 72],

                ['type'=> 'Pro',
                'price'=> 9.99,
                'duration'=> 144],

        ];


        foreach ($sponsors as $sponsor) {
            $sponsorDB = new Sponsor();
            $sponsorDB->type = $sponsor['type'];
            $sponsorDB->price = $sponsor['price'];
            $sponsorDB->duration = $sponsor['duration'];


            $sponsorDB->save();

        }



    }
}
