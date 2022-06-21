<?php

namespace Database\Admins\Seeders;
use Admins\Models\NewsFeed;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsFeed::create([
            'name' => 'First news', 
            'details' => 'this is a good news ...',
            'created_by' => 1,
        ]);
    }
}
