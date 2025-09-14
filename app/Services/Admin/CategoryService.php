<?php
namespace App\Services\Admin;
use App\Helpers\HttpResponseHelper;
use App\Helpers\ImageHelpers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Models\Category;
class CategoryService
{


    public static function getAll($request){
        try {
            
            return Category::all();

        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
    public static function storeDocument($request)
    {
        return [
            'name' => $request->name,
        ];
    }
    public static function store($request){
        try {
            return Category::create(self::storeDocument($request));
           
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function update($request, $id)
    {
        try {
            dd($request->all()); 
            $category = Category::findOrFail($id);

            // Prepare updated data
            $data = [
                'name' => $request->has('name') ? $request->get('name') : $category->name,
            ];

            // Update category
            $category->update($data);

            return $category;
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function show($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public static function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Delete the category
            $category->delete();

            return $category;
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
}