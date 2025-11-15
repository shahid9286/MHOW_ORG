<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoGlobal;
use Illuminate\Support\Facades\Cache;

class SeoGlobalController extends Controller
{
  public function edit()
  {
    $seoGlobal = SeoGlobal::instance();
    return view('admin.seoglobal.edit', compact('seoGlobal'));
  }

  public function update(Request $request)
  {
    $seoGlobal = SeoGlobal::first();

    $request->validate([
      'site_name' => 'nullable|string|max:255',
      'meta_info' => 'nullable|string',
    //   'default_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'global_canonical' => 'nullable|string|max:255',
      'robots_default' => 'nullable|string|max:255',
      'robots_txt' => 'nullable|string',
      'google_site_verification' => 'nullable|string|max:255',
      'bing_site_verification' => 'nullable|string|max:255',
      'sitemap_enabled' => 'nullable',
      'sitemap_urls' => 'nullable',
      'sitemap_urls.*' => 'nullable|url',
      'google_analytics_id' => 'nullable|string|max:255',
      'google_tag_manager_id' => 'nullable|string|max:255',
      'facebook_pixel_id' => 'nullable|string|max:255',
      'other_tracking_scripts' => 'nullable|string',
      'og_meta' => 'nullable|string',
      'twitter_meta' => 'nullable|string',
      'structured_data_global' => 'nullable|string',
      'global_header_scripts' => 'nullable|string',
      'global_body_end_scripts' => 'nullable|string',
    ]);

    // if ($request->hasFile('default_meta_image')) {
    //   $file = $request->file('default_meta_image');
    //   $filename = time() . '_' . $file->getClientOriginalName();
    //   $destination = 'assets/uploads/images/seo/';
    //   $path = public_path($destination);

    //   // ✅ Delete old image if exists
    //   if (!empty($seoGlobal->default_meta_image) && file_exists(public_path($seoGlobal->default_meta_image))) {
    //     unlink(public_path($seoGlobal->default_meta_image));
    //   }

    //   // ✅ Move new image
    //   $file->move($path, $filename);

    //   // ✅ Save full relative path
    //   $seoGlobal->default_meta_image = $destination . $filename;
    // }

    $seoGlobal->site_name = $request->site_name;
    $seoGlobal->meta_info = $request->meta_info;
    $seoGlobal->global_canonical = $request->global_canonical;
    $seoGlobal->robots_default = $request->robots_default;
    $seoGlobal->robots_txt = $request->robots_txt;
    $seoGlobal->google_site_verification = $request->google_site_verification;
    $seoGlobal->bing_site_verification = $request->bing_site_verification;
    $seoGlobal->sitemap_enabled = $request->has('sitemap_enabled') ? true : false;
    $seoGlobal->sitemap_urls = $request->sitemap_urls ? array_map('trim', explode(',', $request->sitemap_urls)) : [];
    $seoGlobal->google_analytics_id = $request->google_analytics_id;
    $seoGlobal->google_tag_manager_id = $request->google_tag_manager_id;
    $seoGlobal->facebook_pixel_id = $request->facebook_pixel_id;
    $seoGlobal->other_tracking_scripts = $request->other_tracking_scripts;
    $seoGlobal->og_meta = $request->og_meta;
    $seoGlobal->twitter_meta = $request->twitter_meta;
    $seoGlobal->structured_data_global = $request->structured_data_global;
    $seoGlobal->global_header_scripts = $request->global_header_scripts;
    $seoGlobal->global_body_end_scripts = $request->global_body_end_scripts;

    $seoGlobal->save();

    $notification = [
      'alert' => 'success',
      'message' => 'SEO Global settings updated successfully!'
    ];

    return redirect()->route('admin.seoglobal.edit')->with('notification', $notification);
  }
  
  public function uploadMetaImage(Request $request)
    {
      
        $request->validate([
            'default_meta_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $oldPath = $request->input('old_image');

        if ($request->hasFile('default_meta_image')) {
            $file = $request->file('default_meta_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $destination = 'assets/uploads/images/seo/';
            $path = public_path($destination);

            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // ✅ Remove old image if exists
            if (! empty($oldPath) && file_exists(public_path($oldPath))) {
                unlink(public_path($oldPath));
            }

            $file->move($path, $filename);

            $relativePath = $destination.$filename;
            $fullUrl = asset($relativePath);

            SeoGlobal::first()->update(['default_meta_image' => $relativePath]);
 Cache::forget('seo_global'); // if you also update global SEO

            return response()->json([
                'success' => true,
                'path' => $relativePath,
                'url' => $fullUrl,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded']);
    }
  
  
  
  
  
  
}