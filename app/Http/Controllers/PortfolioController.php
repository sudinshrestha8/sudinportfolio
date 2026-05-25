<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\Testimonial;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        $hero = Hero::first();
        $about = About::first();
        $skills = Skill::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();
        $experiences = Experience::orderBy('sort_order')->get();
        $education = Education::orderBy('start_year', 'desc')->get();
        $services = Service::orderBy('sort_order')->get();
        $testimonials = Testimonial::where('visible', true)->get();
        $contact = Contact::first();

        return view('portfolio', compact(
            'settings',
            'hero',
            'about',
            'skills',
            'projects',
            'experiences',
            'education',
            'services',
            'testimonials',
            'contact',
        ));
    }
}
