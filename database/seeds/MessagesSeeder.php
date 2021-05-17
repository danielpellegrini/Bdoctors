<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $messages = [
            [
                'user_id' => '1',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '1',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '2',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '2',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '3',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '3',
                'guest_name' => 'guido',
                'guest_email' => 'guido.verdi@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '4',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '4',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'guest_name' => 'anna',
                'guest_email' => 'anna.verdi@gmail.com',
                'content' => 'Buonasera dottore. Se possibile vorrei fissare una visita presso il suo studio di Bologna per la prossima settimana',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '6',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '6',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '7',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '7',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '8',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '8',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '9',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '9',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '10',
                'guest_name' => 'anna',
                'guest_email' => 'anna.verdi@gmail.com',
                'content' => 'Buonasera dottore. Se possibile vorrei fissare una visita presso il suo studio di Bologna per la prossima settimana',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '10',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '11',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '11',
                'guest_name' => 'maria',
                'guest_email' => 'maria.berti@gmail.com',
                'content' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'guest_name' => 'mario',
                'guest_email' => 'mario.rossi@gmail.com',
                'content' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'guest_name' => 'paolo',
                'guest_email' => 'paolo.bianchi@gmail.com',
                'content' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],

        ];

        foreach ($messages as $message) {
            $newMessage = new Message();

            $newMessage->user_id = $message['user_id'];
            $newMessage->guest_name = $message['guest_name'];
            $newMessage->guest_email = $message['guest_email'];
            $newMessage->content = $message['content'];
            $newMessage->created_at = $message['created_at'];

            $newMessage->save();
        }
    }
}
