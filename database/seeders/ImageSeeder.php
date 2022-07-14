<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'name' => 'navbar-logo',
                'path' => 'images/July2022/0w9A5I420KRYkJyKXHsi.png'
            ],
            [
                'name' => 'header-bg',
                'path' => 'images/July2022/WjfE9HbFR6RecMFWA1sJ.jpg'
            ],
            [
                'name' => 'close-icon',
                'path' => 'images/July2022/Qw1tgyO2GPDX02E9jO1B.png'
            ],
            [
                'name' => 'map-image',
                'path' => 'images/July2022/ma0E543vaelZE7cAI4Ya.png'
            ],
            [
                'name' => 'logos-ibm',
                'path' => 'images/July2022/RenlFHRYsH6G021WVPnj.png'
            ],
            [
                'name' => 'logos-facebook',
                'path' => 'images/July2022/1ovjsSNiVaXLcuN8ZVm5.png'
            ],
            [
                'name' => 'logos-google',
                'path' => 'images/July2022/7csGspkFYHN1hvyxnO5P.png'
            ],
            [
                'name' => 'logos-microsoft',
                'path' => 'images/July2022/fFY54OLHWDZDOVCo3KBe.png'
            ],
            [
                'name' => 'about-1',
                'path' => 'images/July2022/ek7E25KyQpXmIaxquFjC.jpg'
            ],
            [
                'name' => 'about-2',
                'path' => 'images/July2022/mjnk5tPOPOO94AiCFFZJ.jpg'
            ],
            [
                'name' => 'about-3',
                'path' => 'images/July2022/mJv1ldHViSx79Ge2tgnn.jpg'
            ],
            [
                'name' => 'about-4',
                'path' => 'images/July2022/Yo4YbBEPqTUR2TV4VYNA.jpg'
            ],
            [
                'name' => 'team-1',
                'path' => 'images/July2022/Pz3xuQs2OJOOPCvBxY2P.jpg'
            ],
            [
                'name' => 'team-2',
                'path' => 'images/July2022/7jLjgDZGvZVlvJH7e2h4.jpg'
            ],
            [
                'name' => 'team-3',
                'path'=> 'images/July2022/8dkXjsWVWJbLh3NOWPmh.jpg'
            ],
            [
                'name' => 'portfolio-1',
                'path' => 'images/July2022/v92FjEvR0LLCnPIcWrMQ.jpg'
            ],
            [
                'name' => 'portfolio-2',
                'path' => 'images/July2022/u76oyM5Q58dAwmUdLNol.jpg'
            ],
            [
                'name' => 'portfolio-3',
                'path' => 'images/July2022/zqEP1mV90v61gv9QMc4z.jpg'
            ],
            [
                'name' => 'portfolio-4',
                'path' => 'images/July2022/2PvxhQHluShxLBXy1j6k.jpg'
            ],
            [
                'name' => 'portfolio-5',
                'path' => 'images/July2022/gXo222e63J9wCV5Mz6ES.jpg'
            ],
            [
                'name' => 'portfolio-6',
                'path' => 'images/July2022/76G77UqLQ5UUdR3kzwu1.jpg'
            ]
        ];

        foreach ($images as $image) {
            Image::updateOrCreate([
                'name' => $image['name'],
                'path' => $image['path'],
            ]);
        }
    }
}
