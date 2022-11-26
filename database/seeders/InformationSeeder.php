<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationSeeder extends Seeder
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
    protected $model = Information::class;

    public function run()
    {

          $information = new Information();
          $information->name = 'info';
          $information->phone = '0665469516';
          $information->email = 'contact@webarys.com';
          $information->siret = '79214022000031';
          $information->welcome = 'Bienvenue chez WEB ARTYS';
          $information->address = '201 rue du stade';
          $information->zip = '84 360';
          $information->city = 'Mérindol';
          $information->country = 'France';
          $information->days = 'Du lundi au vendredi';
          $information->hours = '9h- 18h';
          $information->job = 'Gérant';
          $information->save();



    }
}
