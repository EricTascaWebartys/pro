<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Demo;

class DemosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demo_1 = new Demo();
        $demo_1->text = "Cours de Yoga en ligne";
        $demo_1->category ="Bien-être";
        $demo_1->active = 1;
        $demo_1->image = null;
        $demo_1->position = 1;
        $demo_1->target = "_blank";
        $demo_1->link = "https://gabrielacalcagno.com/";
        $demo_1->save();

        $demo_2 = new Demo();
        $demo_2->text = "A vos claviers";
        $demo_2->category ="Jeux vidéo";
        $demo_2->active = 1;
        $demo_2->image = null;
        $demo_2->position = 2;
        $demo_2->target = "_blank";
        $demo_2->link = "https://gabrielacalcagno.com/";
        $demo_2->save();

        $demo_3 = new Demo();
        $demo_3->text = " Vidéos & Médias";
        $demo_3->category ="Divertissements";
        $demo_3->active = 1;
        $demo_3->image = null;
        $demo_3->position = 3;
        $demo_3->target = "_blank";
        $demo_3->link = "https://www.youtube.com/watch?v=FvyEsM-nefY&ab_channel=CafeMusicBGMchannel";
        $demo_3->save();

          // $faker = Faker\Factory::create('fr_FR');

    }
}
