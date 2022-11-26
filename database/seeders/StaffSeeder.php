<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;


class StaffSeeder extends Seeder
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
    protected $model = Staff::class;

    public function run()
    {
        $staffs = Staff::all();


          $staff = new Staff();
          $staff->firstname = "eric";
          $staff->lastname = "tasca";
          $staff->job = "DÉVELOPPEUR / WEBDESIGNER";
          $staff->job_en = "DEVELOPPEUR / WEBDESIGNER";
          $staff->link_1 = null;
          $staff->link_2 = null;
          $staff->link_3 = "https://www.linkedin.com/in/eric-tasca-4848a2101/";
          $staff->link_4 = null;
          $staff->image = "eric.jpg";
          $staff->position = $staffs->count() + 1;
          $staff->save();

          $staff = new Staff();
          $staff->firstname = "laurent";
          $staff->lastname = "fauqueux";
          $staff->job = "RÉALISATEUR / PHOTOGRAPHE";
          $staff->job_en = "PRODUCER / PHOTOGRAPHER";
          $staff->link_1 = null;
          $staff->link_2 = null;
          $staff->link_3 = "https://www.linkedin.com/in/laurent-fauqueux-16235357/";
          $staff->link_4 = null;
          $staff->image = "laurent.jpg";
          $staff->position = $staffs->count() + 1;
          $staff->save();

          $staff = new Staff();
          $staff->firstname = "regis";
          $staff->lastname = "poletto";
          $staff->job = "SOUND DESIGNER / GRAPHISTE";
          $staff->job_en = "SOUND DESIGNER / GRAPHICS";
          $staff->link_1 = null;
          $staff->link_2 = null;
          $staff->link_3 = "https://www.linkedin.com/in/r%C3%A9gis-poletto-54b98478/";
          $staff->link_4 = null;
          $staff->image = "regis.jpg";
          $staff->position = $staffs->count() + 1;
          $staff->save();

    }
}
