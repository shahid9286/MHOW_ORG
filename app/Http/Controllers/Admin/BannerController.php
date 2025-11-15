<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::orderBy('order_no', 'DESC')->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function add()
    {
        return view('admin.banner.add');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'nullable|max:255',
        'banner_type' => 'nullable|max:255',
        'image' => 'required|mimes:jpeg,jpg,png,webp',
        'order_no' => 'required|numeric',
        'status' => 'required|in:0,1',
    ]);

    $banner = new Banner();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = time().rand().'.'.$extension;
        $file->move('assets/admin/img/banner/', $image);
        $banner->image = $image;
    }

    $banner->title = $request->title;
    $banner->banner_type = $request->banner_type;
    $banner->order_no = $request->order_no;
    $banner->status = $request->status;
    $banner->save();

    $notification = [
        'message' => 'Banner Added Successfully!',
        'alert' => 'success'
    ];
    return redirect("banner")->with('notification', $notification);
}


    public function delete($id)
    {
        $banner = Banner::find($id);
        @unlink('assets/admin/img/banner/' . $banner->image);
        $banner->delete();

        $notification = array(
            'message' => 'Banner Deleted Successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'banner_type' => 'nullable|max:255',
            'image' => 'mimes:jpeg,jpg,png,webp',
            'order_no' => 'required|numeric',
            'status' => 'required|in:0,1',

        ]);

        $banner = Banner::find($id);

        if ($request->hasFile('image')) {
            @unlink('assets/admin/img/banner/' . $banner->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/admin/img/banner/', $image);
            $banner->image = $image;
        }

        $banner->title = $request->title;
        $banner->banner_type = $request->banner_type;
        $banner->order_no = $request->order_no;
        $banner->status = $request->status;
        $banner->save();

        $notification = array(
            'message' => 'Banner Updated Successfully!',
            'alert' => 'success'
        );
        return redirect('banner')->with('notification', $notification);
    }
}
