<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Artificial Intelligence',
            'Machine Learning',
            'Data Science',
            'Cybersecurity',
            'Cloud Computing',
            'DevOps',
            'Blockchain & Web3',
            'Programming Languages',
            'Game Development',
            'UI/UX Design',
            'Internet of Things (IoT)',
            'Augmented Reality (AR)',
            'Virtual Reality (VR)',
            'Robotics',
            'Quantum Computing',
            'Software Testing & QA',
            'Embedded Systems',
            'Big Data',
            'Computer Vision',
            'Natural Language Processing (NLP)',
            'Database Management',
            'E-commerce Development',
            'Digital Marketing',
            'IT Support & System Administration',
            'Project Management',
            'Agile & Scrum',
            'Networking',
            'Operating Systems'
        ];

        foreach ($categories as $category) {
            $randomDate = Carbon::now()->subDays(rand(0, 365));

            Category::create([
                'name' => $category,
                'created_at' => $randomDate,
                'updated_at' => $randomDate,
            ]);
        }
    }
}
