<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            VotesSeeder::class,
            DepartmentsSeeder::class,
            MedicalServicesSeeder::class,
            DoctorsSeeder::class,
            MessagesSeeder::class,
            ReviewsSeeder::class,
            SponsorSeeder::class,

        ]);
    }
}
