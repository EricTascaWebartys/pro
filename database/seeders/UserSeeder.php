<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = User::class;

    public function run()
    {

        $user = new User();
        $user->firstname = 'eric';
        $user->lastname = 'tasca';
        $user->email = 'dev@dev.fr';
        $user->password = bcrypt('1234');
        $user->role = 'ROLE_DEV';
        $user->active = 1;
        $user->gender = 1;
        $user->address = "201 rue du stade";
        $user->zip = "84360";
        $user->city = "Mérindol";
        $user->country = "France";
        $user->company = "Web Artys";
        $user->phone = "0665469516";
        $user->phone_home = null;
        $user->siret = "79214022000031";
        $user->token = uniqid('', 60);
        $user->save();

          $user = new User();
          $user->firstname = 'eric';
          $user->lastname = 'tasca';
          $user->email = 'eric.tasca@hotmail.fr';
          $user->password = bcrypt('admin@c++Et');
          $user->role = 'ROLE_DEV';
          $user->active = 1;
          $user->gender = 1;
          $user->address = "201 rue du stade";
          $user->zip = "84360";
          $user->city = "Mérindol";
          $user->country = "France";
          $user->company = "Web Artys";
          $user->phone = "0665469516";
          $user->phone_home = null;
          $user->siret = "79214022000031";
          $user->token = uniqid('', 60);
          $user->save();

          $user = new User();
          $user->firstname = 'andre';
          $user->lastname = 'de giglio';
          $user->email = 'adg.nettoyage@hotmail.com';
          $user->password = bcrypt('perlina38');
          $user->role = 'ROLE_CLIENT';
          $user->active = 1;
          $user->gender = 1;
          $user->address = "18 Bis avenue de Verdun";
          $user->zip = "13003";
          $user->city = "Le-Pont-De-Claix";
          $user->country = "France";
          $user->company = "adg nettoyage";
          $user->phone = "0688282327";
          $user->phone_home = null;
          $user->siret = "53803545200027";
          $user->website = 'https://adgnettoyage.com/';
          $user->client_number = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
          $user->token = uniqid('', 60);
          $user->save();

          // $faker = Faker\Factory::create('fr_FR');
        //           $faker = \Faker\Factory::create();
        //
        //
        // for ($i = 0; $i < 30; $i++) {
        //
        //     $user = new User();
        //     $user->lastname = $faker->lastName;
        //     $user->firstname = $faker->firstName;
        //     $user->email = $faker->unique()->email;
        //     $user->password = bcrypt('1234');
        //     $user->phone = $faker->phoneNumber;
        //     $user->role = "ROLE_CLIENT";
        //     $user->active = 1;
        //     $user->gender = rand(0,1);
        //     $user->token = uniqid('', 60);
        //     $user->token_connection = uniqid('', 60);
        //     $user->company = $faker->company;
        //     $user->city = $faker->city;
        //     $user->website = 'https://' . $faker->word . '.com';
        //     $user->create_client_number();
        //     $user->create_client_id();
        //     $user->save();
        // }
    }
}
