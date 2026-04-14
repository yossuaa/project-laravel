<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // TOP EVENT
        Event::create([
            'category' => 'top_event',
            'headline' => 'Top Event',
            'subheadline' => 'Launching Rumah Budaya Ratna',
            'date' => '2025-01-20',
            'description' => 'Deskripsi lengkap tentang acara launching.'
        ]);

        // TOP WORKSHOP
        Event::create([
            'category' => 'top_workshop',
            'headline' => 'Top Workshop',
            'subheadline' => 'Workshop Menulis Kreatif',
            'date' => '2025-02-10'
        ]);

        // SHARING SESSION
        Event::create([
            'category' => 'sharing_session',
            'headline' => 'Let’s Sharing Session',
            'subheadline' => 'Ngobrol bareng musisi indie'
        ]);
    }
}
