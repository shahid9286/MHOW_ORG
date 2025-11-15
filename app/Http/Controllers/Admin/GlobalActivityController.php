<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalActivity;
use Illuminate\Http\Request;

class GlobalActivityController extends Controller
{
    public function index()
    {
        $global_activities = GlobalActivity::all();
        return view('admin.global-activity.index', compact('global_activities'));
    }

    public function add()
    {

        return view('admin.global-activity.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'events' => 'required',
            'locations' => 'required',
            'people' => 'required',
            'order' => 'required',
            'status' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $global_activity = new GlobalActivity();

        $global_activity->city = $request->city;
        $global_activity->events = $request->events;
        $global_activity->locations = $request->locations;
        $global_activity->people = $request->people;
        $global_activity->order = $request->order;
        $global_activity->status = $request->status;


        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/global-activity/', $logo);

            $global_activity->logo = $logo;
        }

        $global_activity->save();

        $notification = array(
            'message' => 'Global Activity Added Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.global-activity.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $global_activity = GlobalActivity::findOrFail($id);
        return view('admin.global-activity.edit', compact('global_activity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required',
            'events' => 'required',
            'locations' => 'required',
            'people' => 'required',
            'order' => 'required',
            'status' => 'required',
            'logo' => 'nullable|mimes:jpg,png,jpeg',

        ]);

        $global_activity = GlobalActivity::find($id);
        $global_activity->city = $request->city;
        $global_activity->events = $request->events;
        $global_activity->locations = $request->locations;
        $global_activity->people = $request->people;
        $global_activity->order = $request->order;
        $global_activity->status = $request->status;

        if ($request->hasFile('logo')) {

            @unlink('assets/admin/uploads/global-activity/' . $global_activity->logo);

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/global-activity/', $logo);

            $global_activity->logo = $logo;
        }

        $global_activity->save();

        $notification = array(
            'message' => 'Global Activity Updated Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.global-activity.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $global_activity = GlobalActivity::find($id);

        @unlink('assets/admin/uploads/global-activity/' . $global_activity->logo);

        $global_activity->delete();

        $notification = array(
            'message' => 'Global Activity Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
