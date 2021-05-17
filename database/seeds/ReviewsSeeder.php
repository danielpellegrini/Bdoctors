<?php

use App\Review;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $reviews = [
            // Monaldo - Andrologia
            [
                'user_id' => '1',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Cordiale, disponibile e preciso.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => ' Professionista preparato ed empatico. Il connubio tra le qualità professionali e quelle umane è un ulteriore elemento a favore. Studio dotato di diverse apparecchiature diagnostiche e medicali, cosa molto comoda, e personale sempre cortese, attento e disponibile, oltre che preparato. Prezziario congruo. Ottimo giudizio su tutto.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Persona eccezionale per me è stato un immenso piacere conoscere il Dr. Monaldo.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Mauro',
                'email' => $faker->email(),
                'body' => 'Persona professionale e anche simpatica. Ottima scelta.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Alessandro',
                'email' => $faker->email(),
                'body' => 'Dottore molto professionale e preparato, chiaro e paziente nell ascoltarti. Ti mette a tuo agio e ti spiega la visita come si svolge passo passo. Raccomandato',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Roberta',
                'email' => $faker->email(),
                'body' => 'Un medico preparato e sicuro, che sa infondere fiducia e stabilisce da subito una relazione diretta col paziente. Mio padre ha trovato giovamento dalla cura prescritta ed è costantemente in contatto con lui per aggiornarlo sull\'andamento. Le doti umane si sposano perfettamente con la professionalità... non mi pare cosa di poco conto!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Egidio',
                'email' => $faker->email(),
                'body' => 'Un professionista indiscutibile senza eguali.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '1',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Il medico si è dimostrato attento nell\'ascoltare la mia situazione, passatemi il termine, ed estremamente rigoroso nella visita. Lo consiglierei ad un amico. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Fallaci - Cardiologia
            [
                'user_id' => '2',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '2',
                'name' => 'Gaetano',
                'email' => $faker->email(),
                'body' => 'Esperienza professionale e accurata. La dottoressa si è mostrata cordiale ed esaustiva. La visita è stata approfondita e secondo gli accordi presi. La ricontatterò sicuramente in caso lo servisse un cardiologo a cui affidarmi. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '2',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '2',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '2',
                'name' => 'Sergio',
                'email' => $faker->email(),
                'body' => 'sicuramente una persona molto gradevole e molto professionale. Mi è molto piaciuta',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Nucci - Dermatologia
            [
                'user_id' => '3',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '3',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '3',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Giordano - Diabetologia
            [
                'user_id' => '4',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '4',
                'name' => 'Salvatore',
                'email' => $faker->email(),
                'body' => 'Medico di estrema precisione e professionalità. Attento alle necessità del paziente. Gentile e abile nel creare quel rapporto umano che per il paziente è fondamentale. Molto preparato e scrupoloso, aiutando il paziente nel percorso di guarigione migliore.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '4',
                'name' => 'Mirco',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Lo Duca - Endocrinologia
            [
                'user_id' => '5',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '5',
                'name' => 'Daniel',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '5',
                'name' => 'Nadia',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Amara - Medicina dello Sport
            [
                'user_id' => '6',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Cordiale, disponibile e preciso.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => ' Professionista preparata ed empatica. Il connubio tra le qualità professionali e quelle umane è un ulteriore elemento a favore. Studio dotato di diverse apparecchiature diagnostiche e medicali, cosa molto comoda, e personale sempre cortese, attento e disponibile, oltre che preparato. Prezziario congruo. Ottimo giudizio su tutto.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Persona eccezionale per me è stato un immenso piacere conoscere la Dottssa Amara <3.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Una bravissima professionista, molto preparata (anche in virtù della sua esperienza) e molto umana nel raffrontarsi con il paziente.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Gigi',
                'email' => $faker->email(),
                'body' => 'Persona professionale , aperta al dialogo che ti fa sentire a tuo agio.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Mauro',
                'email' => $faker->email(),
                'body' => 'Persona professionale e anche simpatica. Ottima scelta.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Alessandro',
                'email' => $faker->email(),
                'body' => 'Dottoressa molto professionale e preparata, chiara e paziente nell ascoltarti. Ti mette a tuo agio e ti spiega la visita come si svolge passo passo. Raccomandato',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Roberta',
                'email' => $faker->email(),
                'body' => 'Un medico preparato e sicuro, che sa infondere fiducia e stabilisce da subito una relazione diretta col paziente. Mio padre ha trovato giovamento dalla cura prescritta ed è costantemente in contatto con lui per aggiornarlo sull\'andamento. Le doti umane si sposano perfettamente con la professionalità... non mi pare cosa di poco conto!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Egidio',
                'email' => $faker->email(),
                'body' => 'Un professionista indiscutibile senza eguali.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '6',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Il medico si è dimostrato attento nell\'ascoltare la mia situazione, passatemi il termine, ed estremamente rigoroso nella visita. Lo consiglierei ad un amico. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Genovesi - Andrologia
            [
                'user_id' => '7',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Cordiale, disponibile e preciso.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => ' Professionista preparata ed empatica. Il connubio tra le qualità professionali e quelle umane è un ulteriore elemento a favore. Studio dotato di diverse apparecchiature diagnostiche e medicali, cosa molto comoda, e personale sempre cortese, attento e disponibile, oltre che preparato. Prezziario congruo. Ottimo giudizio su tutto.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Una bravissima professionista, molto preparata (anche in virtù della sua esperienza) e molto umana nel raffrontarsi con il paziente.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Gigi',
                'email' => $faker->email(),
                'body' => 'Persona professionale , aperta al dialogo che ti fa sentire a tuo agio.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Mauro',
                'email' => $faker->email(),
                'body' => 'Persona professionale e anche simpatica. Ottima scelta.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Alessandro',
                'email' => $faker->email(),
                'body' => 'Dottoressa molto professionale e preparata, chiara e paziente nell ascoltarti. Ti mette a tuo agio e ti spiega la visita come si svolge passo passo. Raccomandato',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Roberta',
                'email' => $faker->email(),
                'body' => 'Un medico preparato e sicuro, che sa infondere fiducia e stabilisce da subito una relazione diretta col paziente. Mio padre ha trovato giovamento dalla cura prescritta ed è costantemente in contatto con lui per aggiornarlo sull\'andamento. Le doti umane si sposano perfettamente con la professionalità... non mi pare cosa di poco conto!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Egidio',
                'email' => $faker->email(),
                'body' => 'Un professionista indiscutibile senza eguali.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '7',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Il medico si è dimostrato attento nell\'ascoltare la mia situazione, passatemi il termine, ed estremamente rigoroso nella visita. Lo consiglierei ad un amico. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Milani - Cardiologia
            [
                'user_id' => '8',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '8',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '8',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '8',
                'name' => 'Silvia',
                'email' => $faker->email(),
                'body' => 'Molto gentile, professionale e con... enormi capacità! E\' stato un vero piacere.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '8',
                'name' => 'Alessandra',
                'email' => $faker->email(),
                'body' => 'Molto professionale, gentile e disponibile.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '8',
                'name' => 'Giammaria',
                'email' => $faker->email(),
                'body' => 'Cardiologo molto preparato. Vuole capire il perché di certi problemi e indagare sulle cause che li hanno prodotti. Mi ha prescritto un esame delicato da eseguire in dayhospital presso un centro di cardiologia. Nel frattempo mi ha prescritto dei medicinali per aiutare il muscolo cardiaco a fare il suo lavoro senza affaticarsi. Trattandosi di cardiologo interventista lo consiglio.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Ferri - Dermatologia
            [
                'user_id' => '9',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '9',
                'name' => 'Salvatore',
                'email' => $faker->email(),
                'body' => 'Medico di estrema precisione e professionalità. Attento alle necessità del paziente. Gentile e abile nel creare quel rapporto umano che per il paziente è fondamentale. Molto preparato e scrupoloso, aiutando il paziente nel percorso di guarigione migliore.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '9',
                'name' => 'Mirco',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '9',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '9',
                'name' => 'Salvatore',
                'email' => $faker->email(),
                'body' => 'Medico di estrema precisione e professionalità. Attento alle necessità del paziente. Gentile e abile nel creare quel rapporto umano che per il paziente è fondamentale. Molto preparato e scrupoloso, aiutando il paziente nel percorso di guarigione migliore.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '9',
                'name' => 'Mirco',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Trentini - Diabetologia
            [
                'user_id' => '10',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '10',
                'name' => 'Daniel',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '10',
                'name' => 'Nadia',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '10',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '10',
                'name' => 'Daniel',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '10',
                'name' => 'Nadia',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Mazzi - Dietologia
            [
                'user_id' => '11',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '11',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '11',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '11',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '11',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '11',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            // Gallo - Endocrinologia
            [
                'user_id' => '12',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Persona molto professionale e disponibile.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Ottimo professionista, affidabile e disponibile.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Persona molto professionale e disponibile.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Ottimo professionista, affidabile e disponibile.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],
            [
                'user_id' => '12',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche i bambini.',
                'created_at' => $faker->dateTimeInInterval('-7 days', '+7 days')
            ],

        ];

        foreach ($reviews as $review) {
            $newReview = new Review();

            $newReview->user_id = $review['user_id'];
            $newReview->name = $review['name'];
            $newReview->email = $review['email'];
            $newReview->body = $review['body'];
            $newReview->created_at = $review['created_at'];


            $newReview->save();
        }
    }
}
