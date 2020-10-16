<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $titles = ['todoリスト作成する','勉強する','エンジニアになる'];
        foreach ($titles as $title) {
          DB::table('tasks')->insert([
            'title' => $title,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
          ]);
        }
    }
}
