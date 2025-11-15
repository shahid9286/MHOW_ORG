<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UkActivity;
use Illuminate\Http\Request;

class UkActivityController extends Controller
{
    public function index()
    {
        $uk_activities = UkActivity::all();
        return view('admin.uk-activity.index', compact('uk_activities'));
    }

    public function add()
    {

        return view('admin.uk-activity.add');
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

        $uk_activity = new UkActivity();

        $uk_activity->city = $request->city;
        $uk_activity->events = $request->events;
        $uk_activity->locations = $request->locations;
        $uk_activity->people = $request->people;
        $uk_activity->order = $request->order;
        $uk_activity->status = $request->status;


        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/uk-activity/', $logo);

            $uk_activity->logo = $logo;
        }

        $uk_activity->save();

        $notification = array(
            'message' => 'Uk Activity Added Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.uk-activity.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $uk_activity = UkActivity::findOrFail($id);
        return view('admin.uk-activity.edit', compact('uk_activity'));
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

        $uk_activity = UkActivity::find($id);
        $uk_activity->city = $request->city;
        $uk_activity->events = $request->events;
        $uk_activity->locations = $request->locations;
        $uk_activity->people = $request->people;
        $uk_activity->order = $request->order;
        $uk_activity->status = $request->status;

        if ($request->hasFile('logo')) {

            @unlink('assets/admin/uploads/uk-activity/' . $uk_activity->logo);

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $logo = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/uk-activity/', $logo);

            $uk_activity->logo = $logo;
        }

        $uk_activity->save();

        $notification = array(
            'message' => 'Uk Activity Updated Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.uk-activity.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $uk_activity = UkActivity::find($id);

        @unlink('assets/admin/uploads/uk-activity/' . $uk_activity->logo);

        $uk_activity->delete();

        $notification = array(
            'message' => 'Uk Activity Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
