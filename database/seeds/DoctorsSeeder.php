<?php

use App\User;
use App\UserDetail;
use App\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $votes = Vote::all();

        function getRandomFromArray($array) {
            return $array[rand(0, (count ($array) - 1))];
        }

        $users = [
            [
                'name' => 'Lorenzo',
                'lastname' => 'Monaldo',
                'department' => '1',
                'email' => 'monaldo@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Campi Flegrei, 17',
            ],
            [
                'name' => 'Palmira',
                'lastname' => 'Fallaci',
                'department' => '2',
                'email' => 'fallaci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Ponte In Valtellina, 2',
            ],
            [
                'name' => 'Germano',
                'lastname' => 'Nucci',
                'department' => '3',
                'email' => 'nucci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Piazza San Carlo, 13',
            ],
            [
                'name' => 'Albina',
                'lastname' => 'Giordano',
                'department' => '4',
                'email' => 'giordano@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Venezia, 56',
            ],
            [
                'name' => 'Romilda',
                'lastname' => 'Lo Duca',
                'department' => '5',
                'email' => 'loduca@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Catullo, 34',
            ],
            [
                'name' => 'Carmela',
                'lastname' => 'Amara',
                'department' => '10',
                'email' => 'carmela-amara@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via della Borgata, 44',
            ],

            [
                'name' => 'Germano',
                'lastname' => 'Genovesi',
                'department' => '1',
                'email' => 'genovesi@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via del Caggio, 17',
            ],
            [
                'name' => 'Albertino',
                'lastname' => 'Milani',
                'department' => '2',
                'email' => 'milani@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Vicolo Cieco Fondachetto, 28',
            ],
            [
                'name' => 'Domenico',
                'lastname' => 'Ferri',
                'department' => '3',
                'email' => 'ferri@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Nuova Agnano, 53',
            ],
            [
                'name' => 'Ausilia',
                'lastname' => 'Trentini',
                'department' => '4',
                'email' => 'trentini@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Francesco Girardi, 133',
            ],
            [
                'name' => 'Luce',
                'lastname' => 'Mazzi',
                'department' => '5',
                'email' => 'mazzi@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Antonio da Legnago, 24',
            ],
            [
                'name' => 'Martina',
                'lastname' => 'Gallo',
                'department' => '10',
                'email' => 'gallo@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Matteo Schilizzi, 142',
            ]
        ];

        foreach ($users as $user) {
            $newUser = new User();

            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->address = $user['address'];

            $newUser->save();

            $newUser->departments()->attach($user['department']);

            for ($i=0; $i < 25; $i++) {
                $newUser->votes()->attach(getRandomFromArray($votes), ['created_at' => $faker->dateTimeInInterval('-12 months', '+12 months')]);
            }


        }



        $userDetails = [
            [
                'user_id' => '1',
                'pic' => 'img/doc_5.jpg',
                'phone' => '+3903564039188',
                'curriculum' => '
# Titoli conseguiti

- Specializzazione in Andrologia presso l’Università di Pisa nel 1992;
- Specializzazione in Chirurgia Generale presso l’Università degli Studi di Roma “La Sapienza” nel 1987;
- Specializzazione in Oncologia presso l’Università degli Studi di Roma “La Sapienza” nel 1980;
- Specializzazione in Endocrinologia presso l’Università degli Studi di Roma “La Sapienza” nel 1977.

# Curriculum e attività
Laurea in Medicina e Chirurgia presso l’Università degli Studi di Roma “La Sapienza” (luglio 1974);
dal 1975 al 2001 Assistente e quindi Aiuto della Chirurgia Generale dell\'Ospedale San Carlo Nancy di Roma;
dal 1982 ad oggi Dirigente dello Studio di Andrologia e di Chirurgia Andrologica di Roma, prima struttura andrologica privata di Roma;
Ha pubblicato oltre 200 articoli su riviste straniere ed italiane, Editor di Diagnosing Impotence (Masson 1989), Diagnosing Infertility (Karger, 1991);
organizzatore degli International Meeting of Andrology che hanno portato a Roma i più grandi andrologi del mondo;
visitato oltre 30.000 pazienti con patologie andrologiche; una ricche casistica personale di protesi peniene (oltre 500);
Frequenza istituto e laboratori della Clinica Medica V, Università Sapienza di Roma dal 1970 al 1974;
Frequenza del Reparto di Urologia Klinikum Steglitz di Berlino 1981, 1982, 1983. Istituto Andrologico de Baleares dal 1984 al 1987;
lavora presso alcune strutture accreditate con il SSN.

# Apparecchiature utilizzate
Ecografo, EcoColorDoppler, Rigiscan, Biotesiometro, Cistoscopio sottile, UroFlussimetria, UroDinaMica, Onde Urto Extracorporee a Bassa Intensità (LIESW).

# Patologie trattate
- Aneiaculazione
- Biofeedback
- Calcoli renali
- Cisti renali
- Cistite
- Colica renale
- Condilomi
- Criptorchidismo
- Disfunzione erettile
- Disturbi della sfera sessuale
- Eiaculazione precoce
- Falloplastica
'
            ],
            [
                'user_id' => '2',
                'pic' => 'img/dottssa_1.jpg',
                'phone' => '+3903561325788',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione in Cardiologia conseguita presso l\'Università degli Studi di Pavia (ottobre 2006).

# Curriculum e attività
- Laurea in Medicina e Chirurgia presso l\'Università degli Studi G. D\'Annunzio di Chieti (ottobre 2002);
- Principali mansioni e responsabilità Attività clinico assistenziale (UTIC, PS, Reparto di Cardiologia) Attività diagnostica non invasiva (ecocardiografia transtoracica, test ergometrico, Holter ECG, Monitoraggio Pressorio, ecoDoppler TSA);
- Attività interventistica in sala di emodinamica: diagnostica vascolare coronarica e periferica, angioplastiche coronariche e periferiche;
- 1998-1999 Tirocinio elettivo presso l’Istituto di Medicina interna;
- 1999-2002 Medico interno presso la Divisione di Cardiologia (Responsabile Prof. R De Caterina).

# Apparecchiature utilizzate
- Ecocardio colordoppler, test da sforzo, holter ecg, holter pressorio.

# Patologie trattate
- Angina (angina pectoris)
- Aritmie
- Arteriosclerosi
- Cardiomiopatia
- Cardiopatia ischemica
- Dispnea (Fame d\'aria)
- Extrasistolia
- Fibrillazione atriale
- Insufficienza mitralica
- Scompenso cardiaco
- Stenosi Aortica
- Tachicardia

# Metodologie diagnostiche e terapeutiche
- Cardiopatia ischemica, cardiomiopatia, patologie valvolari, aritmie.'
            ],
            [
                'user_id' => '3',
                'pic' => 'img/doc_7.jpg',
                'phone' => '+3903546289475',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Dermatologia e Venereologia presso Università degli Studi di Messina;
- Perfezionato in Dermatologia Cosmetologica presso Università degli Studi di Messina con votazione finale 50/50
- Perfezionato in Dermatologia Tropicale presso Università degli Studi di Messina con votazione finale 50/50

# Curriculum e attività
Laurea con Lode in Medicina e Chirurgia presso l’Università degli Studi di Catania;
Ha effettuato diversi Master in Dermatoscopia digitale.
Dal 1999, vincitore di concorso pubblico come Dirigente Medico I° livello (ex Aiuto), presso l’Azienda Ospedaliera di Alta Specializzazione Garibaldi-Catania, nell’U.O. di Dermatologia e Venereologia.
# Patologie trattate
- Tumori cutanei
# Metodologie diagnostiche e terapeutiche
Studio dei Tumori cutanei tramite dermatoscopia manuale e digitale, interventi chirurgici, ablazioni Laser, dermatologia allergologica.'
            ],
            [
                'user_id' => '4',
                'pic' => 'img/dottssa_2.jpg',
                'phone' => '+39035675632545',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione, Magna Cum Laude, in Endocrinologia e Malattie del Ricambio, conseguita presso la II Università degli Studi di Roma, "Tor Vergata";
- Ricercatrice in Neuroscienze  presso la Georgetown University, Washington, D. C. USA (1992);
- Ricercatrice in Neuroscienze presso la Stony Brook University, Stony Brook , NY, USA (1996-1997).

# Curriculum e attività
- Laurea in Medicina e Chirurgia, Magna Cum Laude, conseguita presso l\'Università Cattolica del Sacro Cuore di Roma (luglio 1989);
- Attività di ricerca nel campo della “Neuroimmunoendocrinologia”, i cui risultati sono stati pubblicati su riviste internazionali e presentati a congressi nazionali ed internazionali;
- Insegnamento di Patologia Generale presso la scuola per infermieri professionali, San Giuseppe di Roma;
- Ricercatrice accreditata presso l’ASP della Regione Lazio;
- Dal 2008 Tutor per studenti del V e VI anno dell’Università Cattolica del Sacro Cuore;
- Dal 2008 Tutor per laureati abilitandi dell’Università Cattolica del Sacro Cuore;
- Autrice del libro \'La tiroide e le sue patologie\' (Giacomo Catalani editore).

# Patologie trattate
- Acne
- Adenomi ipofisari
- Alterazioni del ciclo mestruale
- Amenorrea
- Arteriosclerosi
- Diabete mellito
- Dieta Mediterranea
- Dislipidemia (alterazione lipidi nel sangue)
- Gozzo (o struma)
- Ipercolesterolemia
- Iperparatiroidismo
- Iperprolattinemie
- Ipertensione arteriosa
- Ipertiroidismo'
            ],
            [
                'user_id' => '5',
                'pic' => 'img/dottssa_3.jpg',
                'phone' => '+3903564598665',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Endocrinologia e Malattie del Ricambio presso l\'Università degli Studi di Roma "La Sapienza".

# Curriculum e attività
Laurea in Medicina e Chirurgia presso l\'Università degli Studi di Roma "La Sapienza" (ottobre 1991);
Dirigente Medico Endocrinologa presso l\'Ospedale di San Giovanni Addolorata di Roma.

# Patologie trattate
- Amenorrea
- Ginecomastia
- Gozzo (o struma)
- Iperparatiroidismo
- Iperprolattinemie
- Ipertiroidismo
- Ipotiroidismo
- Irsutismo (ipertricosi)
- Morbo di Basedow
- Noduli tiroidei
- Osteoporosi
- Tiroidite
- Tiroidite di Hashimoto (tiroidite cronica autoimmune)
- Tumore alla tiroide
# Metodologie diagnostiche e terapeutiche
- Ipoparatiroidismo'
            ],
            [
                'user_id' => '6',
                'pic' => 'img/dottssa_6.jpg',
                'phone' => '+3903564598665',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Medicina dello Sport presso L\'Università degli Studi di Roma "La Sapienza" (2007);

# Curriculum e attività
- Laurea in Medicina e Chirurgia conseguita presso l’Università degli Studi di Roma “La Sapienza” (2004).
- 2007-2008 Referente antidoping del Comitato Italiano Paralimpico.
- 2007-2008 Medico addetto alle squadre nazionali della Federazione Italiana Canottaggio.
- 2007-2008 collaborazione con l’Unità di Sincope, Dipartimento di Cardiologia, dell’Ospedale G. B. Grassi di Ostia diretto dal Prof. Ammirati;
- Gennaio-Febbraio 2009 Periodo di training presso il dipartimento di cardiologia del King’s College Hospital and University Hospital Lewisham, Londra- U.K.;
- Dal 2007 docente presso la Scuola dello Sport del Lazio;
- Dal 2007 Medico Doping Control Officer per la FMSI;
- Attualmente in servizio presso l’Istituto Nazionale di Medicina e Scienze dello Sport “Giulio Onesti” di Roma nel dipartimento di Medicina e Cardiologia dello Sport diretto dal Prof. A. Pelliccia;
- Attualmente in servizio presso l’ambulatorio di cardiologia dell’Associazione Cavalieri Italiani del Sovrano Militare dell’Ordine di Malta.

# Metodologie diagnostiche e terapeutiche
- Elettrocardiografia standard e da sforzo, Valutazione funzionale cardiometabolica (test da sforzo cardiopolmonare), Valutazione funzionale respiratoria (spirometria), Consulenza nutrizionale (con valutazione della percentuale di massa magra e di massa grassa e dieta personalizzata), Holter Metabolico, Visita clinica.'
            ],




            [
                'user_id' => '7',
                'pic' => 'img/doc_6.jpg',
                'phone' => '+3903564598665',
                'curriculum' =>
                '
# Titoli conseguiti

- Specializzazione in Andrologia presso l’Università di Pisa nel 1992;
- Specializzazione in Chirurgia Generale presso l’Università degli Studi di Roma “La Sapienza” nel 1987;
- Specializzazione in Oncologia presso l’Università degli Studi di Roma “La Sapienza” nel 1980;
- Specializzazione in Endocrinologia presso l’Università degli Studi di Roma “La Sapienza” nel 1977.

# Curriculum e attività
Laurea in Medicina e Chirurgia presso l’Università degli Studi di Roma “La Sapienza” (luglio 1974);
dal 1975 al 2001 Assistente e quindi Aiuto della Chirurgia Generale dell\'Ospedale San Carlo Nancy di Roma;
dal 1982 ad oggi Dirigente dello Studio di Andrologia e di Chirurgia Andrologica di Roma, prima struttura andrologica privata di Roma;
Ha pubblicato oltre 200 articoli su riviste straniere ed italiane, Editor di Diagnosing Impotence (Masson 1989), Diagnosing Infertility (Karger, 1991);
organizzatore degli International Meeting of Andrology che hanno portato a Roma i più grandi andrologi del mondo;
visitato oltre 30.000 pazienti con patologie andrologiche; una ricche casistica personale di protesi peniene (oltre 500);
Frequenza istituto e laboratori della Clinica Medica V, Università Sapienza di Roma dal 1970 al 1974;
Frequenza del Reparto di Urologia Klinikum Steglitz di Berlino 1981, 1982, 1983. Istituto Andrologico de Baleares dal 1984 al 1987;
lavora presso alcune strutture accreditate con il SSN.

# Apparecchiature utilizzate
Ecografo, EcoColorDoppler, Rigiscan, Biotesiometro, Cistoscopio sottile, UroFlussimetria, UroDinaMica, Onde Urto Extracorporee a Bassa Intensità (LIESW).

# Patologie trattate
- Aneiaculazione
- Biofeedback
- Calcoli renali
- Cisti renali
- Cistite
- Colica renale
- Condilomi
- Criptorchidismo
- Disfunzione erettile
- Disturbi della sfera sessuale
- Eiaculazione precoce
- Falloplastica
'
            ],
            [
                'user_id' => '8',
                'pic' => 'img/doc_10.jpg',
                'phone' => '+3903561325788',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione in Cardiologia conseguita presso l\'Università degli Studi di Pavia (ottobre 2006).

# Curriculum e attività
- Laurea in Medicina e Chirurgia presso l\'Università degli Studi G. D\'Annunzio di Chieti (ottobre 2002);
- Principali mansioni e responsabilità Attività clinico assistenziale (UTIC, PS, Reparto di Cardiologia) Attività diagnostica non invasiva (ecocardiografia transtoracica, test ergometrico, Holter ECG, Monitoraggio Pressorio, ecoDoppler TSA);
- Attività interventistica in sala di emodinamica: diagnostica vascolare coronarica e periferica, angioplastiche coronariche e periferiche;
- 1998-1999 Tirocinio elettivo presso l’Istituto di Medicina interna;
- 1999-2002 Medico interno presso la Divisione di Cardiologia (Responsabile Prof. R De Caterina).

# Apparecchiature utilizzate
- Ecocardio colordoppler, test da sforzo, holter ecg, holter pressorio.

# Patologie trattate
- Angina (angina pectoris)
- Aritmie
- Arteriosclerosi
- Cardiomiopatia
- Cardiopatia ischemica
- Dispnea (Fame d\'aria)
- Extrasistolia
- Fibrillazione atriale
- Insufficienza mitralica
- Scompenso cardiaco
- Stenosi Aortica
- Tachicardia

# Metodologie diagnostiche e terapeutiche
- Cardiopatia ischemica, cardiomiopatia, patologie valvolari, aritmie.'
            ],
            [
                'user_id' => '9',
                'pic' => 'img/doc_4.jpg',
                'phone' => '+3903546289475',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Dermatologia e Venereologia presso Università degli Studi di Messina;
- Perfezionato in Dermatologia Cosmetologica presso Università degli Studi di Messina con votazione finale 50/50
- Perfezionato in Dermatologia Tropicale presso Università degli Studi di Messina con votazione finale 50/50

# Curriculum e attività
Laurea con Lode in Medicina e Chirurgia presso l’Università degli Studi di Catania;
Ha effettuato diversi Master in Dermatoscopia digitale.
Dal 1999, vincitore di concorso pubblico come Dirigente Medico I° livello (ex Aiuto), presso l’Azienda Ospedaliera di Alta Specializzazione Garibaldi-Catania, nell’U.O. di Dermatologia e Venereologia.
# Patologie trattate
- Tumori cutanei
# Metodologie diagnostiche e terapeutiche
Studio dei Tumori cutanei tramite dermatoscopia manuale e digitale, interventi chirurgici, ablazioni Laser, dermatologia allergologica.'
            ],
            [
                'user_id' => '10',
                'pic' => 'img/dottssa_5.jpg',
                'phone' => '+39035675632545',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione, Magna Cum Laude, in Endocrinologia e Malattie del Ricambio, conseguita presso la II Università degli Studi di Roma, "Tor Vergata";
- Ricercatrice in Neuroscienze  presso la Georgetown University, Washington, D. C. USA (1992);
- Ricercatrice in Neuroscienze presso la Stony Brook University, Stony Brook , NY, USA (1996-1997).

# Curriculum e attività
- Laurea in Medicina e Chirurgia, Magna Cum Laude, conseguita presso l\'Università Cattolica del Sacro Cuore di Roma (luglio 1989);
- Attività di ricerca nel campo della “Neuroimmunoendocrinologia”, i cui risultati sono stati pubblicati su riviste internazionali e presentati a congressi nazionali ed internazionali;
- Insegnamento di Patologia Generale presso la scuola per infermieri professionali, San Giuseppe di Roma;
- Ricercatrice accreditata presso l’ASP della Regione Lazio;
- Dal 2008 Tutor per studenti del V e VI anno dell’Università Cattolica del Sacro Cuore;
- Dal 2008 Tutor per laureati abilitandi dell’Università Cattolica del Sacro Cuore;
- Autrice del libro \'La tiroide e le sue patologie\' (Giacomo Catalani editore).

# Patologie trattate
- Acne
- Adenomi ipofisari
- Alterazioni del ciclo mestruale
- Amenorrea
- Arteriosclerosi
- Diabete mellito
- Dieta Mediterranea
- Dislipidemia (alterazione lipidi nel sangue)
- Gozzo (o struma)
- Ipercolesterolemia
- Iperparatiroidismo
- Iperprolattinemie
- Ipertensione arteriosa
- Ipertiroidismo'
            ],
            [
                'user_id' => '11',
                'pic' => 'img/dottssa_4.jpg',
                'phone' => '+3903564598665',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Endocrinologia e Malattie del Ricambio presso l\'Università degli Studi di Roma "La Sapienza".

# Curriculum e attività
Laurea in Medicina e Chirurgia presso l\'Università degli Studi di Roma "La Sapienza" (ottobre 1991);
Dirigente Medico Endocrinologa presso l\'Ospedale di San Giovanni Addolorata di Roma.

# Patologie trattate
- Amenorrea
- Ginecomastia
- Gozzo (o struma)
- Iperparatiroidismo
- Iperprolattinemie
- Ipertiroidismo
- Ipotiroidismo
- Irsutismo (ipertricosi)
- Morbo di Basedow
- Noduli tiroidei
- Osteoporosi
- Tiroidite
- Tiroidite di Hashimoto (tiroidite cronica autoimmune)
- Tumore alla tiroide
# Metodologie diagnostiche e terapeutiche
- Ipoparatiroidismo'
            ],
            [
                'user_id' => '12',
                'pic' => 'img/dottssa_7.jpg',
                'phone' => '+3903564598665',
                'curriculum' => '
# Titoli conseguiti
- Specializzazione con Lode in Medicina dello Sport presso L\'Università degli Studi di Roma "La Sapienza" (2007);

# Curriculum e attività
- Laurea in Medicina e Chirurgia conseguita presso l’Università degli Studi di Roma “La Sapienza” (2004).
- 2007-2008 Referente antidoping del Comitato Italiano Paralimpico.
- 2007-2008 Medico addetto alle squadre nazionali della Federazione Italiana Canottaggio.
- 2007-2008 collaborazione con l’Unità di Sincope, Dipartimento di Cardiologia, dell’Ospedale G. B. Grassi di Ostia diretto dal Prof. Ammirati;
- Gennaio-Febbraio 2009 Periodo di training presso il dipartimento di cardiologia del King’s College Hospital and University Hospital Lewisham, Londra- U.K.;
- Dal 2007 docente presso la Scuola dello Sport del Lazio;
- Dal 2007 Medico Doping Control Officer per la FMSI;
- Attualmente in servizio presso l’Istituto Nazionale di Medicina e Scienze dello Sport “Giulio Onesti” di Roma nel dipartimento di Medicina e Cardiologia dello Sport diretto dal Prof. A. Pelliccia;
- Attualmente in servizio presso l’ambulatorio di cardiologia dell’Associazione Cavalieri Italiani del Sovrano Militare dell’Ordine di Malta.

# Metodologie diagnostiche e terapeutiche
- Elettrocardiografia standard e da sforzo, Valutazione funzionale cardiometabolica (test da sforzo cardiopolmonare), Valutazione funzionale respiratoria (spirometria), Consulenza nutrizionale (con valutazione della percentuale di massa magra e di massa grassa e dieta personalizzata), Holter Metabolico, Visita clinica.'
            ],


        ];

        foreach ($userDetails as $userDetail) {
            $newUserDetail = new UserDetail();

            $newUserDetail->user_id = $userDetail['user_id'];
            $newUserDetail->pic = $userDetail['pic'];
            $newUserDetail->phone = $userDetail['phone'];
            $newUserDetail->curriculum = $userDetail['curriculum'];

            $newUserDetail->save();
        }
    }
}
