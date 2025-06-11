<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'name' => 'New Cairo Technological University',
            'image' => 'assets/IMG/NCT.png',
            'major' => 'Programming Engineering',
            'location' => 'New Cairo',
            'duration' => '1 hour',
            'is_available' => 1
        ]);

        Job::create([
            'name' => '6 October Technological University',
            'image' => 'assets/IMG/d5b0478d-231c-4671-ab6b-df1e707d52cf.jpeg',
            'major' => 'Networking Engineering',
            'location' => '6 October',
            'duration' => '3 hours',
        ]);

        Job::create([
            'name' => 'Misr Technological University',
            'image' => 'assets/IMG/th.jpeg',
            'major' => 'Telecommunication Engineering',
            'location' => 'Cairo',
            'duration' => '5 hours',
        ]);

        Job::create([
            'name' => 'Port Said University',
            'image' => 'assets/IMG/p13.png',
            'major' => 'Python',
            'location' => 'Port Said',
            'duration' => '2 hours',
        ]);

        Job::create([
            'name' => 'Modern University',
            'image' => 'assets/IMG/p3.JPG',
            'major' => 'Computer Science',
            'location' => 'Giza',
            'duration' => '4 hours',
        ]);

        Job::create([
            'name' => 'Gharbia University',
            'image' => 'assets/IMG/p15.png',
            'major' => 'Network',
            'location' => 'Gharbia',
            'duration' => '6 hours',
        ]);
    }
}

//php artisan db:seed --class=JobSeeder



