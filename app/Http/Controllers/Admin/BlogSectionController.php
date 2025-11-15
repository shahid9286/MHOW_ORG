<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Blog, BlogSection, BlogSetting};
use Illuminate\Support\Facades\DB;

class BlogSectionController extends Controller
{
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $sections = BlogSection::where('blog_id', $blog->id)->get();
        return view('admin.blog.partials.blog_section_list', compact('sections', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.blog.partials.blog_section_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'order_no' => 'required|integer|min:1',
            'type' => 'required|in:L-2-R,R-2-L',
            'description' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        // dd('ss');
        DB::beginTransaction();

        $blog = Blog::where('slug', $slug)->first();
        $section = new BlogSection();
        $section->blog_id = $blog->id;
        $section->title = $request->title;
        $section->subtitle = $request->subtitle;
        $section->description = $request->description;
        $section->order_no = $request->order_no;
        $section->type = $request->type;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/BlogSection/thumb/'), $imageName);
            $section->image = 'assets/admin/uploads/BlogSection/thumb/' . $imageName;
        }

        $section->save();

        $lastOrder = BlogSetting::where('blog_id', $blog->id)->max('order_no');
        $orderNo = $lastOrder ? $lastOrder + 1 : 1;

        BlogSetting::create([
            'blog_id' => $blog->id,
            'reference_id' => $section->id,
            'reference_type' => BlogSection::class,
            'order_no' => $orderNo,
        ]);

        DB::commit();
        return redirect()->route('admin.blog.section.index', $slug)
            ->with('notification', [
                'message' => 'Blog Section Added Successfully!',
                'alert' => 'success',
            ]);
    }

    public function edit($id)
    {
        $section = BlogSection::findOrFail($id);
        $slug = $section->blog->slug;
        return view('admin.blog.partials.blog_section_edit', compact('section', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order_no' => 'required|integer|min:1',
            'type' => 'required',
            'description' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        $section = BlogSection::findOrFail($id);
        $section->title = $request->title;
        $section->subtitle = $request->subtitle;
        $section->description = $request->description;
        $section->order_no = $request->order_no;
        $section->type = $request->type;

        // Handle new image upload
        if ($request->hasFile('image')) {
            if ($section->image && file_exists(public_path($section->image))) {
                unlink(public_path($section->image));
            }

            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/BlogSection/thumb/'), $imageName);
            $section->image = 'assets/admin/uploads/BlogSection/thumb/' . $imageName;
        }

        $section->save();
        DB::commit();

        return redirect()->route('admin.blog.section.index', $section->blog->slug)
            ->with('notification', [
                'message' => 'Blog Section Updated Successfully!',
                'alert' => 'success',
            ]);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        $section = BlogSection::findOrFail($id);

        if ($section->image && file_exists(public_path($section->image))) {
            unlink(public_path($section->image));
        }

        $section->delete();

        BlogSetting::where('reference_id', $section->id)
            ->where('reference_type', BlogSection::class)
            ->delete();

        $settings = BlogSetting::where('blog_id', $section->blog_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }
        DB::commit();

        return back()->with('notification', [
            'message' => 'Blog Section Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
