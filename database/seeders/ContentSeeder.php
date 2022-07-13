<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'name' => 'welcome',
                'text' => 'welcome'
            ],
            [
                'name' => 'welcome-master',
                'text' => 'welcome-master'
            ]
        ];

        foreach ($images as $image) {
            Content::create($image);
        }
    }
}
