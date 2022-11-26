<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;


class PackageSeeder extends Seeder
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
    protected $model = Package::class;

    public function run()
    {

          $package = new Package();
          $package->name = "Essentiel";
          $package->description = "Correction technique et maintenance";
          $package->duration = "3-month";
          $package->active = 1;
          $package->save();

          $package = new Package();
          $package->name = "Zen";
          $package->description = "Comprend la garantie Essentiel avec possibilité de mettre à jour un maxium de 5 pages";
          $package->duration = "1-year";
          $package->price = "500";
          $package->active = 1;
          $package->save();

          $package = new Package();
          $package->name = "Sérenité";
          $package->description = "Comprend la garantie Zen avec possibilité d'une mise à jour majeur comprenand une fonctionnalité";
          $package->duration = "1-year";
          $package->price = "1000";
          $package->active = 1;
          $package->save();

          $package = new Package();
          $package->name = "Premium";
          $package->description = "Comprend la garantie Essentiel avec l'ajout des produits (photos, description...) et création des pages pour les réseaux sociaux";
          $package->duration = "1 month";
          $package->price = "2000";
          $package->active = 1;
          $package->save();

    }
}
