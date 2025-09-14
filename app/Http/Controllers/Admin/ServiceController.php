<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ImageHelpers; 


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->only('name', 'category_id', 'description');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $resizedImage = ImageHelpers::resizeImage($image, 800); // Resize to 800px width
            $filePath = ImageHelpers::saveImage($resizedImage, 'uploads/services', $fileName);
    
            $data['image'] = $filePath;
        }
    
        Service::create($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Service Created Successfully!');
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->only('name', 'category_id', 'description');
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
    
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $resizedImage = ImageHelpers::resizeImage($image, 800); // Resize to 800px width
            $filePath = ImageHelpers::saveImage($resizedImage, 'uploads/services', $fileName);
    
            $data['image'] = $filePath;
        }
    
        $service->update($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Service Updated Successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service Deleted');
    }
}
