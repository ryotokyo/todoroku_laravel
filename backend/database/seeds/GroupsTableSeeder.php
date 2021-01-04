<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $groups = ['日常','勉強','仕事'];
      foreach ($groups as $group) {
        DB::table('groups')->insert([
          'group_name' => $group,
          'created_at' => new Datetime(),
          'updated_at' => new Datetime()
        ]);
      }
        //
    }
}
