<?php

use App\Vote;
use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes = [
            1,
            2,
            3,
            4,
            5
        ];

        foreach ($votes as $vote) {
            $voteDB = new Vote();
            $voteDB->value = $vote;

            $voteDB->save();

        }
    }
}
