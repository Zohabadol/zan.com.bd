<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'profile' => 'nullable|image',
        ]);

        $data = $request->only('name', 'designation', 'comment');

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, 'uploads/testimonials', time() . uniqid() . '.' . $file->getClientOriginalExtension());
            $data['profile'] = $path;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'profile' => 'nullable|image',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;

        if ($request->hasFile('profile')) {
            // Delete old image if exists
            if ($testimonial->profile && file_exists(public_path($testimonial->profile))) {
                unlink(public_path($testimonial->profile));
            }

            $file = $request->file('profile');
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, 'uploads/testimonials', time() . uniqid() . '.' . $file->getClientOriginalExtension());
            $testimonial->profile = $path;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete the profile image if it exists
        if ($testimonial->profile && file_exists(public_path($testimonial->profile))) {
            unlink(public_path($testimonial->profile));
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
