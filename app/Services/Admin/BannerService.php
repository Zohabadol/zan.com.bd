<?php

namespace App\Services\Admin;

use App\Helpers\HttpResponseHelper;
use App\Helpers\ImageHelpers;
use App\Models\Banner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class BannerService
{
    public static function getAll($request)
    {
        try {
            return Banner::all();
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function ImageUpload(UploadedFile $file)
    {
        $storagePath = 'images/Banner';
        $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        // $image = ImageHelpers::resizeImage($file);
        return ImageHelpers::saveImage($file, $storagePath, $fileName);
    }

    public static function storeDocument($request)
    {
        return [
            'name' => $request->name,
            'short_content' => $request->short_content,
            'image' => $request->image ? self::ImageUpload($request->image) : '',
        ];
    }

    public static function store($request)
    {
        try {
            return Banner::create(self::storeDocument($request));
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function show($id)
    {
        try {
            return Banner::findOrFail($id);
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function update($request, $id)
    {
        try {

            $banner = Banner::findOrFail($id);
    
            // Get existing values
            $data = [
                'name' => $request->has('name') ? $request->get('name') : $banner->name,
                'short_content' => $request->has('short_content') ? $request->get('short_content') : $banner->short_content,
                'image' => $banner->image, // Default to old image
            ];
    
            // If new image provided, upload and replace
            if ($request->hasFile('image')) {
                $data['image'] = self::ImageUpload($request->file('image'));
            }
    
            // Update the banner
            $banner->update($data);
    
            return $banner;
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
    
    

    public static function destroy($id)
    {
        try {
            $banner = Banner::findOrFail($id);
            if (File::exists($banner->image)) {
                File::delete($banner->image);
            }
            return $banner->delete();
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
}
