<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\HttpResponseHelper;
use App\Services\Admin\CategoryService;
class CategoryContrller extends Controller

{
    public function index(Request $request){
        $category=CategoryService::getAll($request);
        return HttpResponseHelper::successResponse(" category fetched successfully", $category, 200);
    }
    public function store(Request $request)
    {
     
            $banner = CategoryService::store($request);
            return HttpResponseHelper::successResponse("Category created successfully", $banner, 201);
       
    }
      // Show a category by ID
      public function show($id)
      {
          $category = CategoryService::show($id);
          if ($category instanceof \Illuminate\Database\Eloquent\Model) {
              return HttpResponseHelper::successResponse("Category fetched successfully", $category, 200);
          } else {
              return $category; // Returning the error response if category is not found
          }
      }
  
      // Update a category
      public function update(Request $request, $id)
      {
          $category = CategoryService::update($request, $id);
          if ($category instanceof \Illuminate\Database\Eloquent\Model) {
              return HttpResponseHelper::successResponse("Category updated successfully", $category, 200);
          } else {
              return $category; // Returning the error response if update fails
          }
      }
  
      // Delete a category
      public function destroy($id)
      {
          $category = CategoryService::destroy($id);
          if ($category) {
              return HttpResponseHelper::successResponse("Category deleted successfully", $category, 200);
          } else {
              return $category; // Returning the error response if deletion fails
          }
      }
}
