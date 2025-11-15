<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bcategory;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\VolunteerType;

class FrontController extends Controller
{
    public function index()
    {
        
        $sliders = Slider::where('status', 1)->orderBy('serial_no', 'ASC')->get();
        $projects = Project::where('status', 'active')->get();
        $events = Event::where(['status' => 'active', 'visibility' => 'featured'])->orderBy('order_no', 'ASC')->select('id', 'title', 'image', 'slug')->get();
        $partners = Partner::where('status', 'published')->orderBy('order_no', 'ASC')->get();
        $countries = Country::all();
        $galleries = Gallery::where("category_id", 2)->orderBy("serial_number", "ASC")->get();
        return view('front.index', compact('sliders', 'countries', 'projects', 'events', 'partners', 'galleries'));
    }
    
    public function aboutUs()
    {
        $countries = Country::all();
        return view('front.pages.about-us', compact('countries'));
    }
    
    public function projects()
    {
        $projects = Project::where('status', 'active')->get();
        return view('front.pages.projects', compact('projects'));
    }
    
    public function donate(Request $request)
    {

        return view('front.pages.donate-now');
    }
    
    public function contactUs()
    {
        return view('front.pages.contact-us');
    }

    public function becomeVolunteer()
    {
        $volunteer_types = VolunteerType::where('status', 'active')->get();
        $countries = Country::get();
        return view('front.pages.volunteer', compact('volunteer_types', 'countries'));
    }
    
    public function events()
    {
        $events = Event::where('status', 'active')->orderBy('start_date', 'desc')->orderBy('order_no', 'asc')->get();
        return view('front.pages.events', compact('events'));
    }
    
    public function charityPages()
    {
        $events = Event::where('status', 'active')->where('page_type', 'charity')->orderBy('start_date', 'desc')->orderBy('order_no', 'asc')->get();
        return view('front.pages.events', compact('events'));
    }

    public function landingPages()
    {
        $events = Event::where('status', 'active')->where('page_type', 'lending')->orderBy('start_date', 'desc')->orderBy('order_no', 'asc')->get();
        return view('front.pages.events', compact('events'));
    }
    
    public function gallery()
    {
        $galleries = Gallery::where('status', 1)->where("category_id", '!=', 2)->orderBy('serial_number', 'asc')->get();
        return view('front.pages.gallery', compact('galleries'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->orderBy('serial_number', 'ASC')->get();
        return view('front.blog.index', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->with(['settings.reference'])
            ->firstOrFail();
        return view('front.blog.detail', compact('blog'));
    }
}
