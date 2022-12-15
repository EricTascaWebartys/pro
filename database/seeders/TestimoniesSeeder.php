<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Testimony;
use App\Models\User;

class TestimoniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('role', 'ROLE_DEV')->first();
        $testimony_1 = new Testimony();
        $testimony_1->firstname = "romain";
        $testimony_1->lastname ="dumas";
        $testimony_1->type = null;
        $testimony_1->text= "Très soucieux de la satisfaction des clients. Travailler avec des personnes aussi compétentes que passionnées est un réel plaisir. Je recommande !";
        $testimony_1->image = null;
        $testimony_1->job = "entrepreneur";
        $testimony_1->position = 1;
        $testimony_1->token = uniqid('', 60);
        $testimony_1->user_id = 1;
        $testimony_1->save();

        $testimony_2 = new Testimony();
        $testimony_2->firstname ="laetitia";
        $testimony_2->lastname ="boulloud";
        $testimony_2->type = null;
        $testimony_2->text= "J'ai apprécié de travailler de façon bienveillante et agréable. De plus, chacune de mes demandes ont trouvé une solution. Même mes idées les plus complexes.";
        $testimony_2->image = null;
        $testimony_2->job = "architecte / gérante";
        $testimony_2->position = 2;
        $testimony_2->token = uniqid('', 60);
        $testimony_2->user_id = 1;
        $testimony_2->save();

        $position = 2;
        for ($i=0; $i < 20; $i++) {
            $position = $position + 1;
            $testimony = new Testimony();
            $testimony->firstname ="test";
            $testimony->lastname =$i + 1;
            $testimony->type = "client";
            $testimony->text= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
            $testimony->image = null;
            $testimony->job = "client test";
            $testimony->position = $position;
            $testimony->active = 1;
            $testimony->token = uniqid('', 60);
            $testimony->user_id = 1;
            $testimony->save();
        }

          // $faker = Faker\Factory::create('fr_FR');

    }
}
