<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skills;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'PHP',
            'JavaScript',
            'Python',
            'Java',
            'C#',
            'C++',
            'Ruby',
            'Swift',
            'Kotlin',
            'TypeScript',
            'Go',
            'SQL',
            'MySQL',
            'PostgreSQL',
            'MongoDB',
            'React',
            'Angular',
            'Vue.js',
            'Node.js',
            'Express.js',
            'Django',
            'Laravel',
            'Spring Boot',
            'Flutter',
            'React Native',
            'AWS',
            'Azure',
            'Google Cloud',
            'Docker',
            'Kubernetes',
            'DevOps',
            'Agile',
            'Scrum',
            'UI/UX Design',
            'HTML',
            'CSS',
            'Adobe Photoshop',
            'Adobe Illustrator',
            'Figma',
            'Sketch',
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Data Analysis',
            'Data Mining',
            'Big Data',
            'Business Intelligence',
            'Project Management',
            'Marketing',
            'Sales',
            'Customer Service',
            'Digital Marketing',
            'SEO',
            'SEM',
            'Social Media Marketing',
            'Content Writing',
            'Copywriting',
            'Graphic Design',
            'Video Editing',
            'Photography',
            'Microsoft Office',
            'Google Workspace',
            // Add more skills as needed
        ];

        foreach ($skills as $skname) {
            Skills::create(['name' => $skname]);
        }
    }
}
