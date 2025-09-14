<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeServiceController extends Controller
{
   // In ServiceController.php
   public function filterServices(Request $request)
   {
       $categoryId = $request->query('category');
   
       // If categoryId is provided, filter services by the related category
       if ($categoryId) {
           $category = Category::find($categoryId);
           
           // If category found, get related services
           if ($category) {
               $services = $category->services; // Get all services related to the category
           } else {
               // If category not found, return empty collection
               $services = collect();
           }
       } else {
           // If no category is provided, return all services
           $services = Service::all();
       }
   
       // Return services as JSON response
       return response()->json(['services' => $services]);
   }
   
   

}
