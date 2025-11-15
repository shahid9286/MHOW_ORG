<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Blog, BlogBlock, BlogBlockFeature, BlogSetting};
use Illuminate\Support\Facades\DB;

class BlogBlockController extends Controller
{
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blocks = BlogBlock::where('blog_id', $blog->id)->get();
        return view('admin.blog.partials.block_list', compact('blocks', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.blog.partials.block_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required|in:L-2-R,R-2-L',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.title' => 'nullable|string',
            'features.*.order_no' => 'nullable|integer',
        ]);

        DB::beginTransaction();
        $blog = Blog::where('slug', $slug)->first();
        $block = new BlogBlock();
        $block->title = $request->input('title');
        $block->subtitle = $request->input('subtitle');
        $block->description = $request->input('description');
        $block->type = $request->input('type');
        $block->blog_id = $blog->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/block/thumb/'), $imageName);
            $block->image = 'assets/admin/uploads/blog/block/thumb/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/block/icons/'), $iconName);
            $block->icon = 'assets/admin/uploads/blog/block/icons/' . $iconName;
        }

        $block->save();

        if ($request->has('features')) {
            foreach ($request->input('features') as $feature) {
                $blockFeature = new BlogBlockFeature();
                $blockFeature->blog_block_id = $block->id;
                $blockFeature->title = $feature['title'] ?? '';
                $blockFeature->order_no = $feature['order'] ?? 0;
                $blockFeature->save();
            }
        }
        $lastOrder = BlogSetting::where('blog_id', $blog->id)->max('order_no');
        $orderNo = $lastOrder ? $lastOrder + 1 : 1;

        BlogSetting::create([
            'blog_id' => $blog->id,
            'reference_id' => $block->id,
            'reference_type' => BlogBlock::class,
            'order_no' => $orderNo,
        ]);
        DB::commit();
        return redirect()->route('admin.blog.block.index', $blog->slug)->with('notification', [
            'message' => 'Blog BlogBlock Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $block = BlogBlock::with('features')->findOrFail($id);
        $slug = $block->blog->slug;
        return view('admin.blog.partials.block_edit', compact('block', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required|in:L-2-R,R-2-L',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.id' => 'nullable|integer|exists:block_features,id',
            'features.*.title' => 'nullable|string',
            'features.*.order_no' => 'nullable|integer',
        ]);

        $block = BlogBlock::findOrFail($id);
        $block->title = $request->input('title');
        $block->subtitle = $request->input('subtitle');
        $block->description = $request->input('description');

        if ($request->hasFile('image')) {
            if ($block->image && file_exists(public_path($block->image))) {
                unlink(public_path($block->image));
            }

            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/block/thumb/'), $imageName);
            $block->image = 'assets/admin/uploads/blog/block/thumb/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            if ($block->icon && file_exists(public_path($block->icon))) {
                unlink(public_path($block->icon));
            }

            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/blog/block/icons/'), $iconName);
            $block->icon = 'assets/admin/uploads/blog/block/icons/' . $iconName;
        }

        $block->save();

        $block->features()->delete();
        if ($request->has('features')) {
            foreach ($request->input('features') as $featureData) {
                $feature = new BlogBlockFeature();
                $feature->blog_block_id = $block->id;
                $feature->title = $featureData['title'] ?? '';
                $feature->order_no = $featureData['order'] ?? 0;
                $feature->save();
            }
        }

        return redirect()->route('admin.blog.block.index', $block->blog->slug)->with('notification', [
            'message' => 'Blog BlogBlock Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        $block = BlogBlock::findOrFail($id);
        $block->features()->delete();

        if ($block->image && file_exists(public_path($block->image))) {
            unlink(public_path($block->image));
        }

        if ($block->icon && file_exists(public_path($block->icon))) {
            unlink(public_path($block->icon));
        }

        $block->delete();
        BlogSetting::where('reference_id', $block->id)
            ->where('reference_type', BlogBlock::class)
            ->delete();

        $settings = BlogSetting::where('blog_id', $block->blog_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }
        DB::commit();
        return redirect()->back()->with('notification', [
            'message' => 'Blog BlogBlock Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
