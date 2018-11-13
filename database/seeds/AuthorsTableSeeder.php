<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "test",
                "email" => "test@example.com",
                "github" => "test",
                "twitter" => "test",
                "location" => "gthhsd",
                "latest_article_published" => "Test Article",
                "created_at" => "2018-11-11 13:59:55",
                "updated_at" => "2018-11-11 13:59:55"
            ],
            [
                "name" => "test2",
                "email" => "test2@example.om",
                "github" => "git",
                "twitter" => "@mike",
                "location" => "egypt",
                "latest_article_published" => "Test3 Article",
                "created_at" => "2018-11-11 14:04:54",
                "updated_at" => "2018-11-11 14:13:21"
            ]
        ];
        DB::table('authors')->insert($data);
    }
}
