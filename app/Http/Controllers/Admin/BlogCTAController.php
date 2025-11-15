<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Blog, BlogCTA, BlogSetting};
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogCTAController extends Controller
{
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $ctas = BlogCTA::where('blog_id', $blog->id)->orderBy('created_at', 'desc')->get();
        return view('admin.blog.partials.call_to_actions_list', compact('slug', 'ctas'));
    }


    public function add($slug)
    {
        return view('admin.blog.partials.call_to_action_add', compact('slug'));
    }


    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text_1' => 'required|string|max:255',
            'button_link_1' => 'required|url|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();
        // Create new CTA
        $blog = Blog::where('slug', $slug)->first();

        $cta = new BlogCTA();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/cta/'), $imageName);
            $cta->image = 'assets/admin/uploads/blog/cta/' . $imageName;
        }

        $cta->blog_id = $blog->id;
        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->description = $request->description;
        $cta->button_text_1 = $request->button_text_1;
        $cta->button_link_1 = $request->button_link_1;
        $cta->button_text_2 = $request->button_text_2;
        $cta->button_link_2 = $request->button_link_2;
        $cta->status = $request->status;
        $cta->save();
        $lastOrder = BlogSetting::where('blog_id', $blog->id)->max('order_no');
        $orderNo = $lastOrder ? $lastOrder + 1 : 1;

        BlogSetting::create([
            'blog_id' => $blog->id,
            'reference_id' => $cta->id,
            'reference_type' => BlogCTA::class,
            'order_no' => $orderNo,
        ]);
        DB::commit();
        // Return JSON response
        return redirect()->route('admin.blog.cta.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'CallToAction added Successfully!']);
    }

    public function edit($id)
    {
        $cta = BlogCTA::findOrFail($id);
        $slug = $cta->blog->slug;
        return view('admin.blog.partials.call_to_action_edit', compact('cta', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text_1' => 'required|string|max:255',
            'button_link_1' => 'required|url|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);


        $cta = BlogCTA::findOrFail($id);

        if ($request->hasFile('image')) {
            @unlink(filename: public_path($cta->image));
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/cta/'), $imageName);
            $cta->image = 'assets/admin/uploads/blog/cta/' . $imageName;
        }

        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->description = $request->description;
        $cta->button_text_1 = $request->button_text_1;
        $cta->button_link_1 = $request->button_link_1;
        $cta->button_text_2 = $request->button_text_2;
        $cta->button_link_2 = $request->button_link_2;
        $cta->status = $request->status;
        $cta->save();

        return redirect()->route('admin.blog.cta.index', ['slug' => $cta->blog->slug])->with('notification', ['alert' => 'success', 'message' => 'CallToAction updated Successfully!']);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        $cta = BlogCTA::findOrFail($id);
        @unlink(public_path($cta->image));
        $cta->delete();
        BlogSetting::where('reference_id', $cta->id)
            ->where('reference_type', BlogCTA::class)
            ->delete();

        $settings = BlogSetting::where('blog_id', $cta->blog_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }
        DB::commit();
        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'CallToAction deleted Successfully!']);
    }
}
