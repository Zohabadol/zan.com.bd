<?php
namespace App\Http\Controllers\Admin;
use App\Helpers\ImageHelpers; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
{
    $banners = Banner::latest()->get();
    return view('admin.banner.index', compact('banners'));
}
public function create()
{
    return view('admin.banner.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'short_content' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    $data = $request->only('name', 'short_content');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $image = ImageHelpers::resizeImage($file);
        $path = ImageHelpers::saveImage($image, 'uploads/banners', time() . uniqid() . '.' . $file->getClientOriginalExtension());
        $data['image'] = $path;
    }

    Banner::create($data);

    return redirect()->route('admin.banner.index')->with('success', 'Banner created successfully.');
}

public function edit($id)
{
    $banner = Banner::findOrFail($id);
    return view('admin.banner.edit', compact('banner'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'short_content' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    $banner = Banner::findOrFail($id);

    $banner->name = $request->name;
    $banner->short_content = $request->short_content;

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $file = $request->file('image');
        $image = ImageHelpers::resizeImage($file);
        $path = ImageHelpers::saveImage($image, 'uploads/banners', time() . uniqid() . '.' . $file->getClientOriginalExtension());
        $banner->image = $path;
    }

    $banner->save();

    return redirect()->route('admin.banner.index')->with('success', 'Banner updated successfully.');
}


public function destroy($id)
{
    $banner = Banner::findOrFail($id);
    $banner->delete();

    return redirect()->route('admin.banner.index')->with('success', 'Banner deleted successfully');
}

}
