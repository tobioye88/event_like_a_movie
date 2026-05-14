<?php

namespace Database\Seeders;

use App\Models\Streams;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Streams::count() > 0) {
            return;
        }

        Streams::factory()->create([
            'intro' => 'Welcome to our love story',
            'couples_name' => 'Gbemi & Dokun',
            'slug' => 'gbemi-dokun-09-11-2023',
            'quote' => '“I saw that you were perfect, and so I loved you. Then I saw that you were not perfect and I loved you even more.” —Angelita Lim',
            'event_date' => '2023-11-09 15:00:00',
            'stream_url' => 'https://www.youtube.com/embed/txxjOWS-u9I?controls=1&rel=0&playsinline=0&modestbranding=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Felm.test&widgetid=1&forigin=https%3A%2F%2Felm.test%2Fstreams%2Fgbemidokun&aoriginsup=1&vf=1',
            'description' => 'Join us as we celebrate the love story of Gbemi and Dokun. From their first meeting to their wedding day, we will take you on a journey through their love story. Watch as they exchange vows, share their first dance, and celebrate with their loved ones. This is a day they will never forget, and we are honored to share it with you.',
            'love_story' => "Gbemi & Dokun's Love Story\nOur first contact was via BBM chat in December 2015, our mutual friend; Lolade, had exchanged our contacts. We became close friends almost instantly. Our first date was the icing on the cake, it was surely love at first sight… we met at a poolside lounge and spoke about everything! our friendship gradually evolved into a relationship.\nWith God’s help, we have been able to tackle each challenge with grace and persistence, never giving up on each other. Our relationship has grown daily, with endless love, mutual respect, honesty and understanding. On the 7th of May 2023, we entered a new phase of our relationship and said YES! to forever. At God’s perfect timing, we are entering a new beginning to forever\n#ThePerfectGD23.",
            'tags' => ['love', 'wedding', 'celebration'],
            'gallery' => [
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.42-AM-1-768x953.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.42-AM-768x949.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.43-AM-1-768x951.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-2-1-768x953 (1).jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-2-1-768x953.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-3-768x957.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-4-768x961.jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-768x951 (1).jpeg',
                'https://elm.test/assets/images/WhatsApp-Image-2023-11-23-at-6.37.44-AM-768x951.jpeg',
            ],
            'thumbnail' => 'https://res.cloudinary.com/dzcmadjl1/image/upload/v1700000000/sample.jpg',
            'metadata' => [
                'background_image' => 'https://elm.test/assets/images/bg-gbemi-dokun.jpg',
            ],
            'status' => 'active',
        ]);
    }
}
