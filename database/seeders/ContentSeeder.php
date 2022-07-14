<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            [
                'name' => 'welcome',
                'text' => 'welcome'
            ],
            [
                'name' => 'welcome-master',
                'text' => 'welcome-master'
            ],
            [
                'name' => 'services',
                'text' => 'services',
            ],
            [
                'name' => 'services-master',
                'text' => 'services-master',
            ],
            [
                'name' => 'service-1-master',
                'text' => 'service-1-master',
            ],
            [
                'name' => 'service-1',
                'text' => 'service-1',
            ],
            [
                'name' => 'service-2-master',
                'text' => 'service-2-master',
            ],
            [
                'name' => 'service-2',
                'text' => 'service-2',
            ],
            [
                'name' => 'service-3-master',
                'text' => 'service-3-master',
            ],
            [
                'name' => 'service-3',
                'text' => 'service-3',
            ],
            [
                'name' => 'portfolio-master',
                'text' => 'portfolio-master',
            ],
            [
                'name' => 'portfolio',
                'text' => 'portfolio',
            ],
            [
                'name' => 'portfolio-1-master',
                'text' => 'portfolio-1-master',
            ],
            [
                'name' => 'portfolio-1',
                'text' => 'portfolio-1',
            ],
            [
                'name' => 'portfolio-2-master',
                'text' => 'portfolio-2-master',
            ],
            [
                'name' => 'portfolio-2',
                'text' => 'portfolio-2',
            ],
            [
                'name' => 'portfolio-3-master',
                'text' => 'portfolio-3-master',
            ],
            [
                'name' => 'portfolio-3',
                'text' => 'portfolio-3',
            ],
            [
                'name' => 'portfolio-4-master',
                'text' => 'portfolio-4-master',
            ],
            [
                'name' => 'portfolio-4',
                'text' => 'portfolio-4',
            ],
            [
                'name' => 'portfolio-5-master',
                'text' => 'portfolio-5-master',
            ],
            [
                'name' => 'portfolio-5',
                'text' => 'portfolio-5',
            ],
            [
                'name' => 'portfolio-6-master',
                'text' => 'portfolio-6-master',
            ],
            [
                'name' => 'portfolio-6',
                'text' => 'portfolio-6',
            ],
        ];

        foreach ($contents as $content) {
            Content::create([
                'name' => $content['name'],
                'text' => $content['text'],
            ]);
        }
    }
}
