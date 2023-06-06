<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([[
            'description' => 'Naam Bedrijf',
            'question_category_id' => '1'
        ], [
            'description' => 'Straat en Huisnummer',
            'question_category_id' => '1'
        ], [
            'description' => 'Plaats',
            'question_category_id' => '1'
        ], [
            'description' => 'Provincie',
            'question_category_id' => '1'
        ], [
            'description' => 'Postcode',
            'question_category_id' => '1'
        ], [
            'description' => 'Korte beschrijving van het bedrijf: klanten, producten en organisatiestructuur',
            'question_category_id' => '1'
        ], [
            'description' => 'Op welke afdeling ga je werken?',
            'question_category_id' => '1'
        ], [
            'description' => 'Hoeveel medewerkers werken er in het bedrijf en op de afdeling?',
            'question_category_id' => '1'
        ], [
            'description' => 'Kun je aangeven met wie je hebt gesproken tijdens de opdrachtbriefing/intake, inclusief hun naam, contactgegevens en rol/functie?',
            'question_category_id' => '1'
        ], [
            'description' => 'Kun je aangeven wie je zal begeleiden gedurende het CoMakership-traject, inclusief hun naam, contactgegevens en rol/functie?',
            'question_category_id' => '1'
        ], [
            'description' => 'Welke expertise is er beschikbaar binnen de organisatie voor zowel inhoudelijke begeleiding als beoordeling?',
            'question_category_id' => '1'
        ], [
            'description' => 'Met welke veiligheidsaspecten op het gebied van bedrijfsveiligheid moet er rekening gehouden worden?',
            'question_category_id' => '1'
        ], [
            'description' => 'Welke verwachtingen heb jij van het bedrijf?',
            'question_category_id' => '1'
        ], [
            'description' => 'Welke verwachtingen heeft het bedrijf van jou?',
            'question_category_id' => '1'
        ], [
            'description' => 'In hoeverre mag/moet je op locatie bij de Comakership werken? Zijn je werkzaamheden eventueel ook thuis uit te voeren? In hoeverre ben je bereidt iedere dag te reizen?',
            'question_category_id' => '1'
        ], [
            'description' => 'wat is de probleemsituatie?',
            'question_category_id' => '2'
        ], [
            'description' => 'Wat is de opdracht?',
            'question_category_id' => '2'
        ], [
            'description' => 'Wat is de gewenste eindsituatie?',
            'question_category_id' => '2'
        ],  [
            'description' => 'Welke (eind)producten ga je opleveren?',
            'question_category_id' => '2'
        ],  [
            'description' => 'Hoe past de opdracht bij jouw profiel?',
            'question_category_id' => '2'
        ],  [
            'description' => 'Waar zitten voor jou de uitdagingen tijdens het werken aan de opdracht waarvoor je denkt begeleiding nodig te hebben?',
            'question_category_id' => '2'
        ], [
            'description' => 'In hoeverre is de omvang van de opdracht afgestemd op het aantal ECs?',
            'question_category_id' => '3'
        ],  [
            'description' => 'Is de opdracht zodanig afgebankend dat je een duidelijk individueel meetbaar aandeel hebt? Licht toe',
            'question_category_id' => '3'
        ],  [
            'description' => 'Bevat de opdracht een substantieel onderzoeksdeel? Zo ja, wat is de omvang van het onderzoek t.o.v. de rest van de opdracht?',
            'question_category_id' => '3'
        ],  [
            'description' => 'Wanneer vindt de organisatie dat jij het goed hebt gedaan tijdens je Comakership?',
            'question_category_id' => '4'
        ],  [
            'description' => 'Wanneer ben jij tevreden over hetgeen je hebt gedaan tijdens je Comakership?',
            'question_category_id' => '4'
        ],  [
            'description' => 'Op welke manier plan je de theoretische kennis die je hebt opgedaan tijdens de studie in te zetten bij de Comakership?',
            'question_category_id' => '4'
        ],  [
            'description' => 'Welke voor jou nieuwe onderwerpen denk je tegen te komen tijdens je Comakership?',
            'question_category_id' => '4'
        ],  [
            'description' => 'Waar zie je tegenop? Wat zijn je sterke punten? Wat zijn punten waar je extra begeleiding bij nodig hebt?',
            'question_category_id' => '4'
        ]
        ]);
        // Question::factory(10)->create();
    }
}
