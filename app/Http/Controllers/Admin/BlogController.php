<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use App\Models\Bcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogSetting;

class BlogController extends Controller
{
    // List all blogs
    public function blog(Request $request)
    {
        $blogs = Blog::orderBy('serial_number', 'asc')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    // Show add/edit form
    public function add()
    {
        $bcategories = Bcategory::where('status', 1)->get();
        return view('admin.blog.add', compact('bcategories'));
    }

    // Store new blog
    public function store(Request $request)
    {
        $slug = Str::slug($request->title);

        // Check if slug already exists
        if (Blog::where('slug', $slug)->exists()) {
            return redirect()->back()
                ->withErrors(['title' => 'Title already taken!'])
                ->withInput();
        }

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,webp',
            'title' => 'nullable|max:255',
            'content' => 'nullable',
            'status' => 'nullable',
            'bcategory_id' => 'nullable',
        ]);

        $blog = new Blog();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . rand() . '.' . $extension;
            $file->move('assets/front/img/blog/', $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->slug = $slug;
        $blog->bcategory_id = $request->bcategory_id;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->save();

        $notification = [
            'message' => 'Blog Added successfully!',
            'alert' => 'success'
        ];

        return redirect()->route('admin.blog.edit', ['slug' => $blog->slug])->with('notification', $notification);
    }    // Delete blog
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('assets/front/img/blog/' . $blog->image))) {
            unlink(public_path('assets/front/img/blog/' . $blog->image));
        }

        $blog->delete();

        $notification = [
            'message' => 'Blog Deleted successfully!',
            'alert' => 'success'
        ];

        return redirect()->back()->with('notification', $notification);
    }

    // Show edit form
    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $bcategories = Bcategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('bcategories', 'blog', 'slug'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $slug = Str::slug($request->title, "-");

        // Check if slug exists for other blogs
        if (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return redirect()->back()
                ->withErrors(['title' => 'Title already taken!'])
                ->withInput();
        }

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,webp',
            'title' => 'nullable|max:255',
            'content' => 'nullable',
            'status' => 'nullable',
            'bcategory_id' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            // Remove old image if exists
            if ($blog->image && file_exists(public_path('assets/front/img/blog/' . $blog->image))) {
                unlink(public_path('assets/front/img/blog/' . $blog->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . rand() . '.' . $extension;
            $file->move('assets/front/img/blog/', $imageName);
            $blog->image = $imageName;
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->slug = $slug;
        $blog->bcategory_id = $request->bcategory_id;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->save();

        $notification = [
            'message' => 'Blog Updated successfully!',
            'alert' => 'success'
        ];

        return redirect()->route('admin.blog.index')->with('notification', $notification);
    }

    public function setting($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blog_sections = BlogSetting::where('blog_id', $blog->id)
            ->with('reference')
            ->orderBy('order_no', 'ASC')
            ->get();

        return view('admin.blog.partials.setting', compact('blog_sections', 'slug'));
    }

    public function updateSetting(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $order = $request->input('order', []);

        foreach ($order as $index => $id) {
            BlogSetting::where('id', $id)
                ->where('blog_id', $blog->id)
                ->update(['order_no' => $index + 1]);
        }

        return back()->with('notification', [
            'message' => 'Settings updated Successfully!',
            'alert' => 'success',
        ]);
    }
}
