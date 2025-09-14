<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ServicesService;
use Illuminate\Http\Request;
use App\Helpers\HttpResponseHelper;


class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            $banners = ServicesService::getAll($request);
            return HttpResponseHelper::successResponse("service list fetched successfully", $banners, 200);
        } catch (\Exception $e) {
            return HttpResponseHelper::errorResponse($e->getMessage(), 500);
        }
    }
    public function store(Request $request)
    {
     
            $banner = ServicesService::store($request);
            return HttpResponseHelper::successResponse("Service created successfully", $banner, 201);
       
    }
    public function getByCategory($category_id)
    {
        try {
            $services = ServicesService::getServiceByCategory($category_id);
            return HttpResponseHelper::successResponse('Services fetched successfully',$services,200 );
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
    
}
