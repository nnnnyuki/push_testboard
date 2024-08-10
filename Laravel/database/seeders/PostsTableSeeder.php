<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'user_name' => 'yuki',
                'contents' => '投稿内容の確認です(*´・ω・)ノ'
            ],
            [
                'user_name' => 'yuki',
                'contents' => '2例目の投稿です(*´・ω・)ノ'
            ],
            [
                'user_name' => 'yuki',
                'contents' => '3例目の投稿です(*´・ω・)ノ'
            ],
            [
                'user_name' => 'yuki',
                'contents' => '4例目の投稿です(*´・ω・)ノ'
            ]
        ]);
    }
}
