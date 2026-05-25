<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Hero::create([
            'name' => 'Sudin Shrestha',
            'tagline' => 'Full-Stack Developer & Creative Technologist',
            'subtitle' => 'I craft performant web applications with clean architecture and thoughtful design.',
            'cta_label' => 'View My Work',
            'cta_url' => '#projects',
            'background_style' => 'gradient',
        ]);

        About::create([
            'bio' => "I'm a passionate full-stack developer with a deep love for building elegant, scalable web applications. Over the years, I've honed my skills across the entire stack — from pixel-perfect frontends to robust backend architectures.\n\nI thrive at the intersection of design and engineering, turning complex problems into intuitive digital experiences. When I'm not coding, you'll find me exploring new technologies, contributing to open source, or mentoring aspiring developers.",
            'years_of_experience' => 5,
            'location' => 'Kathmandu, Nepal',
            'availability_status' => 'available',
        ]);

        $skills = [
            ['name' => 'Laravel', 'icon' => 'heroicon-o-server-stack', 'proficiency' => 95, 'category' => 'Backend', 'sort_order' => 1],
            ['name' => 'PHP', 'icon' => 'heroicon-o-code-bracket', 'proficiency' => 92, 'category' => 'Backend', 'sort_order' => 2],
            ['name' => 'MySQL', 'icon' => 'heroicon-o-circle-stack', 'proficiency' => 88, 'category' => 'Backend', 'sort_order' => 3],
            ['name' => 'REST APIs', 'icon' => 'heroicon-o-globe-alt', 'proficiency' => 90, 'category' => 'Backend', 'sort_order' => 4],
            ['name' => 'JavaScript', 'icon' => 'heroicon-o-code-bracket-square', 'proficiency' => 88, 'category' => 'Frontend', 'sort_order' => 5],
            ['name' => 'Tailwind CSS', 'icon' => 'heroicon-o-paint-brush', 'proficiency' => 93, 'category' => 'Frontend', 'sort_order' => 6],
            ['name' => 'Alpine.js', 'icon' => 'heroicon-o-bolt', 'proficiency' => 85, 'category' => 'Frontend', 'sort_order' => 7],
            ['name' => 'Livewire', 'icon' => 'heroicon-o-signal', 'proficiency' => 87, 'category' => 'Frontend', 'sort_order' => 8],
            ['name' => 'Docker', 'icon' => 'heroicon-o-cube', 'proficiency' => 75, 'category' => 'DevOps', 'sort_order' => 9],
            ['name' => 'Git & GitHub', 'icon' => 'heroicon-o-arrow-path', 'proficiency' => 90, 'category' => 'DevOps', 'sort_order' => 10],
            ['name' => 'Linux', 'icon' => 'heroicon-o-command-line', 'proficiency' => 78, 'category' => 'DevOps', 'sort_order' => 11],
            ['name' => 'Figma', 'icon' => 'heroicon-o-swatch', 'proficiency' => 70, 'category' => 'Other', 'sort_order' => 12],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'short_description' => 'A full-featured online marketplace with multi-vendor support, real-time inventory, and Stripe integration.',
                'long_description' => 'Built from scratch using Laravel, this platform handles thousands of concurrent users. Features include multi-vendor dashboards, real-time stock updates via WebSockets, Stripe payment processing, and an advanced product search with Algolia.',
                'tech_stack' => ['Laravel', 'Livewire', 'MySQL', 'Redis', 'Stripe', 'Algolia'],
                'live_url' => 'https://example.com/ecommerce',
                'github_url' => 'https://github.com/example/ecommerce',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Project Management SaaS',
                'short_description' => 'Kanban-style project tracker with team collaboration, time tracking, and automated reporting.',
                'long_description' => 'A SaaS application built for teams to manage their workflows. Includes drag-and-drop Kanban boards, Gantt charts, time tracking with invoice generation, and role-based team permissions.',
                'tech_stack' => ['Laravel', 'Alpine.js', 'Tailwind CSS', 'PostgreSQL', 'Pusher'],
                'live_url' => 'https://example.com/pm-tool',
                'github_url' => 'https://github.com/example/pm-tool',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Healthcare Appointment System',
                'short_description' => 'Telemedicine platform with video consultations, prescription management, and patient records.',
                'long_description' => 'A HIPAA-aware healthcare platform allowing patients to book appointments, join video consultations, and manage prescriptions. Doctors get a dedicated dashboard for patient management.',
                'tech_stack' => ['Laravel', 'Vue.js', 'Twilio', 'MySQL', 'Docker'],
                'live_url' => 'https://example.com/healthcare',
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Real Estate Listing Portal',
                'short_description' => 'Property listing site with map-based search, virtual tours, and agent dashboards.',
                'long_description' => 'A comprehensive real estate platform featuring interactive map search with Mapbox, 360° virtual tours, mortgage calculators, and dedicated agent/buyer dashboards.',
                'tech_stack' => ['Laravel', 'React', 'Mapbox', 'Elasticsearch', 'AWS S3'],
                'live_url' => 'https://example.com/realestate',
                'github_url' => 'https://github.com/example/realestate',
                'featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Learning Management System',
                'short_description' => 'Online course platform with video hosting, quizzes, certificates, and progress tracking.',
                'long_description' => 'An LMS supporting video-based courses with adaptive quizzes, automated certificate generation, student progress analytics, and instructor earning dashboards.',
                'tech_stack' => ['Laravel', 'Livewire', 'Tailwind CSS', 'FFmpeg', 'MySQL'],
                'featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Restaurant POS System',
                'short_description' => 'Touch-friendly point-of-sale with order management, kitchen display, and daily reporting.',
                'long_description' => 'A modern POS designed for restaurants with table management, split billing, kitchen display system via WebSockets, and comprehensive daily/weekly/monthly revenue reports.',
                'tech_stack' => ['Laravel', 'Alpine.js', 'Tailwind CSS', 'MySQL', 'WebSockets'],
                'featured' => false,
                'sort_order' => 6,
            ],
            [
                'title' => 'Social Media Analytics Dashboard',
                'short_description' => 'Unified analytics for Instagram, Twitter, and Facebook with scheduled posting.',
                'long_description' => 'Aggregates social media metrics into a single dashboard. Features include sentiment analysis, competitor tracking, scheduled post publishing, and exportable PDF reports.',
                'tech_stack' => ['Laravel', 'Chart.js', 'Python', 'Redis', 'API Integrations'],
                'featured' => false,
                'sort_order' => 7,
            ],
            [
                'title' => 'Inventory & Warehouse Manager',
                'short_description' => 'Barcode-driven inventory system with multi-warehouse support and automated reorder alerts.',
                'long_description' => 'An inventory management system handling multiple warehouse locations, barcode scanning for stock in/out, automated low-stock alerts, and supplier management with purchase order generation.',
                'tech_stack' => ['Laravel', 'Filament', 'MySQL', 'Barcode API', 'PDF Generation'],
                'featured' => false,
                'sort_order' => 8,
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }

        $experiences = [
            [
                'company' => 'TechVista Solutions',
                'role' => 'Senior Full-Stack Developer',
                'start_date' => '2023-03-01',
                'end_date' => null,
                'description' => 'Leading a team of 5 developers building enterprise SaaS products. Architected a multi-tenant platform serving 200+ businesses. Introduced CI/CD pipelines that reduced deployment time by 70%.',
                'sort_order' => 1,
            ],
            [
                'company' => 'CloudNine Digital',
                'role' => 'Full-Stack Developer',
                'start_date' => '2021-06-01',
                'end_date' => '2023-02-28',
                'description' => 'Developed and maintained 12+ client projects using Laravel and modern frontend technologies. Built a real-time notification system handling 50K+ daily events. Mentored 3 junior developers.',
                'sort_order' => 2,
            ],
            [
                'company' => 'WebCraft Studios',
                'role' => 'Junior Developer',
                'start_date' => '2020-01-15',
                'end_date' => '2021-05-31',
                'description' => 'Built responsive websites and web applications for local businesses. Migrated legacy jQuery codebases to modern Alpine.js implementations. Managed hosting and deployments on shared and VPS servers.',
                'sort_order' => 3,
            ],
        ];
        foreach ($experiences as $exp) {
            Experience::create($exp);
        }

        $educationEntries = [
            [
                'institution' => 'Tribhuvan University',
                'degree' => 'Bachelor of Science',
                'field' => 'Computer Science & Information Technology',
                'start_year' => 2016,
                'end_year' => 2020,
                'description' => 'Graduated with distinction. Focused on software engineering, database systems, and web technologies. Led the university coding club for 2 years.',
            ],
            [
                'institution' => 'National College of Engineering',
                'degree' => 'Higher Secondary (+2)',
                'field' => 'Science (Physics, Chemistry, Mathematics)',
                'start_year' => 2014,
                'end_year' => 2016,
                'description' => 'Completed higher secondary education with a focus on science and mathematics.',
            ],
        ];
        foreach ($educationEntries as $edu) {
            Education::create($edu);
        }

        $services = [
            [
                'title' => 'Custom Web Application Development',
                'description' => 'End-to-end development of scalable web applications tailored to your business needs. From requirements gathering to deployment and maintenance.',
                'icon' => 'heroicon-o-globe-alt',
                'sort_order' => 1,
            ],
            [
                'title' => 'API Design & Integration',
                'description' => 'RESTful API architecture, third-party integrations (payment gateways, social platforms, shipping), and API documentation.',
                'icon' => 'heroicon-o-arrow-path-rounded-square',
                'sort_order' => 2,
            ],
            [
                'title' => 'Admin Panel & Dashboard Development',
                'description' => 'Feature-rich admin panels with Filament — complete with analytics dashboards, role-based access, and intuitive data management interfaces.',
                'icon' => 'heroicon-o-chart-bar',
                'sort_order' => 3,
            ],
            [
                'title' => 'Database Design & Optimization',
                'description' => 'Efficient database schema design, query optimization, indexing strategies, and migration from legacy systems.',
                'icon' => 'heroicon-o-circle-stack',
                'sort_order' => 4,
            ],
            [
                'title' => 'Performance Auditing & Optimization',
                'description' => 'Comprehensive performance audits covering server response times, database queries, caching strategies, and frontend asset delivery.',
                'icon' => 'heroicon-o-rocket-launch',
                'sort_order' => 5,
            ],
            [
                'title' => 'Technical Consulting & Code Review',
                'description' => 'Architecture reviews, code audits, technology stack recommendations, and mentoring for development teams.',
                'icon' => 'heroicon-o-light-bulb',
                'sort_order' => 6,
            ],
        ];
        foreach ($services as $service) {
            Service::create($service);
        }

        $testimonials = [
            [
                'client_name' => 'Sarah Chen',
                'role' => 'CEO',
                'company' => 'NovaBright Technologies',
                'quote' => 'Working with Sudin was an absolute game-changer for our startup. He built our entire platform from scratch in record time, and the code quality is exceptional. His ability to translate our vague ideas into a polished product was remarkable.',
                'rating' => 5,
                'visible' => true,
            ],
            [
                'client_name' => 'James Rodriguez',
                'role' => 'CTO',
                'company' => 'DataStream Inc.',
                'quote' => 'Sudin transformed our legacy monolith into a modern, maintainable Laravel application. The migration was seamless with zero downtime. His deep understanding of database optimization cut our query times by 80%.',
                'rating' => 5,
                'visible' => true,
            ],
            [
                'client_name' => 'Emily Watson',
                'role' => 'Product Manager',
                'company' => 'GreenLeaf Solutions',
                'quote' => "Incredibly professional and technically skilled. Sudin didn't just write code — he actively contributed to our product strategy. The admin dashboard he built has become the backbone of our daily operations.",
                'rating' => 5,
                'visible' => true,
            ],
            [
                'client_name' => 'Michael Okonkwo',
                'role' => 'Founder',
                'company' => 'SwiftPay Africa',
                'quote' => 'Sudin built our payment integration system that now processes thousands of transactions daily. His attention to security and edge cases gives us complete confidence in the platform.',
                'rating' => 4,
                'visible' => true,
            ],
            [
                'client_name' => 'Priya Sharma',
                'role' => 'Director of Engineering',
                'company' => 'EduVerse',
                'quote' => 'We hired Sudin to build our learning management system and he exceeded every expectation. The platform handles 10K+ concurrent students without breaking a sweat. Highly recommend.',
                'rating' => 5,
                'visible' => true,
            ],
        ];
        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        Contact::create([
            'email' => 'hello@sudinshrestha.com',
            'phone' => '+977-9841234567',
            'location' => 'Kathmandu, Nepal',
            'social_links' => [
                'github' => 'https://github.com/sudinshrestha',
                'linkedin' => 'https://linkedin.com/in/sudinshrestha',
                'twitter' => 'https://twitter.com/sudinshrestha',
            ],
        ]);

        SiteSetting::create([
            'site_title' => 'Sudin Shrestha — Full-Stack Developer',
            'meta_description' => 'Full-stack developer specializing in Laravel, Livewire, and modern web technologies. Building performant, scalable web applications with clean architecture.',
            'accent_color' => '#6366f1',
        ]);

        $messages = [
            [
                'name' => 'David Kim',
                'email' => 'david.kim@example.com',
                'subject' => 'Project Inquiry — E-commerce Platform',
                'message' => "Hi Sudin, I came across your portfolio and I'm impressed with your e-commerce work. We're looking to build a similar platform for our retail business. Would love to discuss the project scope and timeline. Available for a call this week?",
                'read' => true,
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Lisa Thompson',
                'email' => 'lisa.t@startup.io',
                'subject' => 'Full-Stack Developer Position',
                'message' => "Hello! We're a growing startup looking for an experienced Laravel developer to join our team. Your profile matches exactly what we're searching for. The role offers competitive compensation and fully remote work. Interested in learning more?",
                'read' => false,
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Raj Patel',
                'email' => 'raj@techcorp.com',
                'subject' => 'API Integration Consulting',
                'message' => "We need help integrating multiple third-party APIs into our existing Laravel application. Saw your services page and it seems like a perfect fit. Can you share your availability and rates for a consulting engagement?",
                'read' => false,
                'created_at' => now()->subDay(),
            ],
        ];
        foreach ($messages as $msg) {
            Message::create($msg);
        }
    }
}
