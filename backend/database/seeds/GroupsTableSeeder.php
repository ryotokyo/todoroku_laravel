<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // \DB::table('groups')->truncate();
      $groups = ['日常','勉強','仕事'];
      foreach ($groups as $group) {
        $model = new Group;
        $model->fill(['name' => $group])->save();
        // DB::table('groups')->insert([
        //   'group_name' => $group,
        //   'created_at' => new Datetime(),
        //   'updated_at' => new Datetime()
        // ]);
      }
        //
    }
}
