<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\BannerService;
use Illuminate\Http\Request;
use App\Helpers\HttpResponseHelper;

class BannerController extends Controller
{
    // Fetch all banners
    public function index(Request $request)
    {
        try {
            $banners = BannerService::getAll($request);
            return HttpResponseHelper::successResponse("Banner list fetched successfully", $banners, 200);
        } catch (\Exception $e) {
            return HttpResponseHelper::errorResponse($e->getMessage(), 500);
        }
    }

    // Store a new banner
    public function store(Request $request)
    {
     
            $banner = BannerService::store($request);
            return HttpResponseHelper::successResponse("Banner created successfully", $banner, 201);
       
    }

    // Show a specific banner
    public function show($id)
    {
        try {
            $banner = BannerService::show($id);
            return HttpResponseHelper::successResponse("Banner fetched successfully", $banner, 200);
        } catch (\Exception $e) {
            return HttpResponseHelper::errorResponse(['message' => $e->getMessage()], 500);
        }
    }

    // Update an existing banner
    public function update(Request $request, $id)
    {
        try {
            $banner = BannerService::update($request, $id);
            return HttpResponseHelper::successResponse("Banner updated successfully", $banner, 200);
        } catch (\Exception $e) {
            return HttpResponseHelper::errorResponse([$e->getMessage()], 500);
        }
    }
    

    // Delete a specific banner
    public function destroy($id)
    {
        try {
            BannerService::destroy($id);
           
            return HttpResponseHelper::successResponse("Banner deleted successfully", null, 200);
        } catch (\Exception $e) {
            return HttpResponseHelper::errorResponse($e->getMessage(), 500);
        }
    }
}
