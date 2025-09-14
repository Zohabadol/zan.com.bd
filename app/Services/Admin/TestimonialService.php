<?php
namespace App\Services\Admin;

use App\Models\Testimonial;
use App\Helpers\ImageHelpers;
use App\Helpers\HttpResponseHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class TestimonialService
{
    public static function ImageUpload(UploadedFile $file)
    {
        $storagePath = 'images/Testimonials';
        $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        $image = ImageHelpers::resizeImage($file);
        return ImageHelpers::saveImage($image, $storagePath, $fileName);
    }

    public static function storeDocument($request)
    {
        return [
            'name' => $request->name,
            'designation' => $request->designation,
            'comment' => $request->comment,
            'profile' => $request->profile ? self::ImageUpload($request->profile) : '',
        ];
    }

    public static function store($request)
    {
        try {
            return Testimonial::create(self::storeDocument($request));
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function update($request, $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $data = self::storeDocument($request);
            $data['profile'] = $request->profile ? self::ImageUpload($request->profile) : $testimonial->profile;
            $testimonial->update($data);
            return $testimonial;
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            if (File::exists($testimonial->profile)) {
                File::delete($testimonial->profile);
            }
            return $testimonial->delete();
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function getAll()
    {
        return Testimonial::all();
    }

    public static function show($id)
    {
        return Testimonial::findOrFail($id);
    }
}
