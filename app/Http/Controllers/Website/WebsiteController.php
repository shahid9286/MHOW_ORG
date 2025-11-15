<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebProject;

class WebsiteController extends Controller
{
    public function webprojectDetail($slug)
    {
        $course = WebProject::where('slug', $slug)
            ->with(['settings.reference'])
            ->firstOrFail();

        return view('website.webproject.detail', compact('course'));
    }
}
