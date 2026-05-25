<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class CvSeeder extends Seeder
{
    public function run(): void
    {
        Skill::query()->delete();
        Project::query()->delete();
        Education::query()->delete();

        $skills = [
            // Languages
            ['name' => 'Java', 'icon' => 'heroicon-o-code-bracket', 'proficiency' => 85, 'category' => 'Backend', 'sort_order' => 1],
            ['name' => 'PHP', 'icon' => 'heroicon-o-code-bracket', 'proficiency' => 80, 'category' => 'Backend', 'sort_order' => 2],
            ['name' => 'C / C++', 'icon' => 'heroicon-o-cpu-chip', 'proficiency' => 82, 'category' => 'Backend', 'sort_order' => 3],
            ['name' => 'SQL (MySQL)', 'icon' => 'heroicon-o-circle-stack', 'proficiency' => 85, 'category' => 'Backend', 'sort_order' => 4],
            ['name' => 'JavaScript', 'icon' => 'heroicon-o-code-bracket-square', 'proficiency' => 78, 'category' => 'Frontend', 'sort_order' => 5],
            ['name' => 'HTML / CSS', 'icon' => 'heroicon-o-paint-brush', 'proficiency' => 80, 'category' => 'Frontend', 'sort_order' => 6],

            // Frameworks
            ['name' => 'Spring', 'icon' => 'heroicon-o-server-stack', 'proficiency' => 82, 'category' => 'Backend', 'sort_order' => 7],
            ['name' => 'Spring Boot', 'icon' => 'heroicon-o-server-stack', 'proficiency' => 85, 'category' => 'Backend', 'sort_order' => 8],

            // Developer tools
            ['name' => 'Git', 'icon' => 'heroicon-o-arrow-path', 'proficiency' => 80, 'category' => 'DevOps', 'sort_order' => 9],
            ['name' => 'Google Cloud Platform', 'icon' => 'heroicon-o-cloud', 'proficiency' => 70, 'category' => 'DevOps', 'sort_order' => 10],
            ['name' => 'DigitalOcean', 'icon' => 'heroicon-o-cloud', 'proficiency' => 68, 'category' => 'DevOps', 'sort_order' => 11],
            ['name' => 'Postman', 'icon' => 'heroicon-o-globe-alt', 'proficiency' => 75, 'category' => 'DevOps', 'sort_order' => 12],
            ['name' => 'VS Code', 'icon' => 'heroicon-o-command-line', 'proficiency' => 88, 'category' => 'Other', 'sort_order' => 13],
            ['name' => 'Visual Studio', 'icon' => 'heroicon-o-computer-desktop', 'proficiency' => 75, 'category' => 'Other', 'sort_order' => 14],
            ['name' => 'IntelliJ', 'icon' => 'heroicon-o-computer-desktop', 'proficiency' => 78, 'category' => 'Other', 'sort_order' => 15],
            ['name' => 'Figma', 'icon' => 'heroicon-o-swatch', 'proficiency' => 72, 'category' => 'Other', 'sort_order' => 16],

            // Programming concepts
            ['name' => 'Object-Oriented Programming', 'icon' => 'heroicon-o-cube', 'proficiency' => 85, 'category' => 'Other', 'sort_order' => 17],
            ['name' => 'Data Structures & Algorithms', 'icon' => 'heroicon-o-chart-bar', 'proficiency' => 80, 'category' => 'Other', 'sort_order' => 18],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        $projects = [
            [
                'title' => 'Inventory Management System',
                'short_description' => 'SME inventory system with Spring Boot, MySQL, JWT auth, Twilio SMS alerts, and a real-time sales dashboard.',
                'long_description' => "Built a system for SMEs to manage inventory more efficiently using Spring Boot for the backend and MySQL for the database, exposed through REST APIs.\n\nFeatures JWT authentication for secure access, Twilio SMS alerts for low-stock items, and a dynamic dashboard showcasing sales metrics, top-selling items, and low-stock alerts. The inventory page allows easy filtering, downloading, and adding of products in real-time for efficient operations.",
                'tech_stack' => ['Spring Boot', 'MySQL', 'REST APIs', 'JWT', 'Twilio'],
                'live_url' => null,
                'github_url' => null,
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Football League Management System',
                'short_description' => 'Local tournament platform for score updates, statistics, and league rankings with Spring Boot and MySQL.',
                'long_description' => "Built a system for local tournament organizers using Spring Boot, MySQL, HTML, CSS, and JavaScript.\n\nAllows users to update scores, view statistics, and track league rankings easily. Streamlines league management with organized data and real-time updates, improving the overall experience for organizers and participants.",
                'tech_stack' => ['Spring Boot', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
                'live_url' => null,
                'github_url' => null,
                'featured' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $education = [
            [
                'institution' => 'Asian College of Higher Studies',
                'degree' => 'Bachelor of Computer Application',
                'field' => 'Computer Application',
                'start_year' => 2022,
                'end_year' => 2026,
                'description' => 'Expected 2026. Relevant coursework: C, C++, Web Technologies, Database Management System, OOP, Java, .NET, Data Structures and Algorithms, Operating System, Distributed System.',
            ],
            [
                'institution' => 'Everest Innovative College',
                'degree' => 'High School',
                'field' => 'Science',
                'start_year' => 2020,
                'end_year' => 2022,
                'description' => 'Completed higher secondary education (2020–2022).',
            ],
        ];

        foreach ($education as $edu) {
            Education::create($edu);
        }
    }
}
