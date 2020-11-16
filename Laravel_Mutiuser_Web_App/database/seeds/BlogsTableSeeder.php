<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([[
            'title' => 'First post',
            'description' => 'First words are amazing because. And much more awesome words in it you should know how amaazing these words is!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'user_id' => 1
        ],[
            'title' => 'Second post',
            'description' => 'Second words are amazing because. And much more awesome words in it you should know how amaazing these words is!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'user_id' => 1
        ],[
            'title' => 'third post',
            'description' => 'third words are amazing because. And much more awesome words in it you should know how amaazing these words is!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'user_id' => 1
            ],[
                'title' => '4 post',
                'description' => '4 words are amazing because. And much more awesome words in it you should know how amaazing these words is!',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'user_id' => 1
            ]]);
    }
}
