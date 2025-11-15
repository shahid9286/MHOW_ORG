<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebProject;
use App\Models\PCategory;
use Illuminate\Support\Str;

class WebProjectController extends Controller
{
    public function index()
    {
        $webprojects = WebProject::with('pcategory')->get();
        return view('admin.webproject.index', compact('webprojects'));
    }

    public function add()
    {
        $categories = PCategory::all();

        return view('admin.webproject.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pcategory_id' => 'required|exists:p_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon_font' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'serial_number' => 'nullable|integer',
        ]);

        $webproject = new WebProject;
        $webproject->pcategory_id = $request->pcategory_id;
        $webproject->title = $request->title;

        $slug = Str::slug($request->title);
        $count = WebProject::where('slug', $slug)->count();
        $webproject->slug = $count ? $slug.'-'.time() : $slug;

        $webproject->content = $request->content;
        $webproject->status = $request->status;
        $webproject->meta_keywords = $request->meta_keywords;
        $webproject->meta_description = $request->meta_description;
        $webproject->serial_number = $request->serial_number ?? 0;
        $webproject->icon_font = $request->icon_font;

        // handle uploads
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $icon = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $icon);
            $webproject->icon = $icon;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $image);
            $webproject->image = $image;
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $banner = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $banner);
            $webproject->banner_image = $banner;
        }

        $webproject->save();

        return redirect()->route('admin.webproject.index')
            ->with('notification', ['message' => 'WebProject Added Successfully!', 'alert' => 'success']);
    }

    public function edit($slug)
    {
        $webproject = WebProject::where('slug', $slug)->firstOrFail();
        $categories = PCategory::all();

        return view('admin.webproject.edit', compact('webproject', 'categories', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $webproject = WebProject::findOrFail($id);

        $request->validate([
            'pcategory_id' => 'nullable|exists:p_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon_font' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'serial_number' => 'nullable|integer',
        ]);

        $webproject->pcategory_id = $request->pcategory_id;
        $webproject->title = $request->title;

        // unique slug (ignore current record)
        $slug = Str::slug($request->title);
        $count = WebProject::where('slug', $slug)
            ->where('id', '!=', $id)
            ->count();
        $webproject->slug = $count ? $slug.'-'.time() : $slug;
        $webproject->content = $request->content;
        $webproject->status = $request->status;
        $webproject->meta_keywords = $request->meta_keywords;
        $webproject->meta_description = $request->meta_description;
        $webproject->serial_number = $request->serial_number ?? 0;
        $webproject->icon_font = $request->icon_font;

        // handle uploads
        if ($request->hasFile('icon')) {
            if ($webproject->icon && file_exists('assets/admin/uploads/webprojects/'.$webproject->icon)) {
                @unlink('assets/admin/uploads/webprojects/'.$webproject->icon);
            }
            $file = $request->file('icon');
            $icon = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $icon);
            $webproject->icon = $icon;
        }

        if ($request->hasFile('image')) {
            if ($webproject->image && file_exists('assets/admin/uploads/webprojects/'.$webproject->image)) {
                @unlink('assets/admin/uploads/webprojects/'.$webproject->image);
            }
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $image);
            $webproject->image = $image;
        }

        if ($request->hasFile('banner_image')) {
            if ($webproject->banner_image && file_exists('assets/admin/uploads/webprojects/'.$webproject->banner_image)) {
                @unlink('assets/admin/uploads/webprojects/'.$webproject->banner_image);
            }
            $file = $request->file('banner_image');
            $banner = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/webprojects/', $banner);
            $webproject->banner_image = $banner;
        }

        $webproject->save();

        return redirect()->back()->with('notification', ['message' => 'WebProject Updated Successfully!', 'alert' => 'success']);
    }

    public function delete($id)
    {
        $webproject = WebProject::findOrFail($id);

        if ($webproject->icon && file_exists('assets/admin/uploads/webprojects/'.$webproject->icon)) {
            @unlink('assets/admin/uploads/webprojects/'.$webproject->icon);
        }
        if ($webproject->image && file_exists('assets/admin/uploads/webprojects/'.$webproject->image)) {
            @unlink('assets/admin/uploads/webprojects/'.$webproject->image);
        }
        if ($webproject->banner_image && file_exists('assets/admin/uploads/webprojects/'.$webproject->banner_image)) {
            @unlink('assets/admin/uploads/webprojects/'.$webproject->banner_image);
        }

        $webproject->settings()->delete();
        $webproject->webprojectBlocks()->delete();
        $webproject->webprojectElements()->delete();
        $webproject->webprojectFeatures()->delete();
        $webproject->webprojectOutlines()->delete();
        $webproject->webprojectWhyChooseUs()->delete();
        $webproject->webprojectSections()->delete();
        $webproject->webprojectCTAs()->delete();

        $webproject->delete();

        return back()->with('notification', [
            'message' => 'WebProject Deleted Successfully!',
            'alert' => 'success',
        ]);
    }

    public function setting($slug)
    {
        $webproject = WebProject::where('slug', $slug)->first();
        $webproject_sections = CourseSetting::where('webproject_id', $webproject->id)
            ->with('reference')
            ->orderBy('order_no', 'ASC')
            ->get();

        return view('admin.webproject.partials.setting', compact('webproject_sections', 'slug'));
    }

    public function updateSetting(Request $request, $slug)
    {
        $webproject = WebProject::where('slug', $slug)->firstOrFail();
        $order = $request->input('order', []);

        foreach ($order as $index => $id) {
            CourseSetting::where('id', $id)
                ->where('webproject_id', $webproject->id)
                ->update(['order_no' => $index + 1]);
        }

        return back()->with('notification', [
            'message' => 'Settings updated Successfully!',
            'alert' => 'success',
        ]);
    }
}
