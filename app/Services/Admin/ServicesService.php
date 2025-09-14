<?php
namespace App\Services\Admin;

use App\Helpers\HttpResponseHelper;
use App\Helpers\ImageHelpers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Models\Service;
class ServicesService {

    public static function getAll($request){
        try {
            
            return Service::all();

        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
    public static function storeDocument($request)
    {
        return [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image ? self::ImageUpload($request->image) : '',
        ];
        
    }
    public static function ImageUpload(UploadedFile $file)
        {
            $storagePath = 'images/';
            $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $image = ImageHelpers::resizeImage($file);
            return ImageHelpers::saveImage($image, $storagePath, $fileName);
        }
        public static function store($request)
        {
            try {
                return Service::create(self::storeDocument($request));
            } catch (\Throwable $th) {
                return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
            }
        }
        public static function getServiceByCategory($category_id)
        {
            try {
                return Service::with('category')
                    ->where('category_id', $category_id)
                    ->get();
            } catch (\Throwable $th) {
                return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
            }
        }
        
    
}