<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\TestimonialService;
use App\Helpers\HttpResponseHelper;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial= TestimonialService::getAll();
        return  HttpResponseHelper::successResponse("testimonial fetch successfully ",$testimonial, 200);
    }

    public function store(Request $request)
    {
        try {
            return TestimonialService::store($request);
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public function show($id)
    {
        return TestimonialService::show($id);
    }

    public function update(Request $request, $id)
    {
        try {
            return TestimonialService::update($request, $id);
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return TestimonialService::destroy($id);
        } catch (\Throwable $th) {
            return HttpResponseHelper::errorResponse([$th->getMessage()], 500);
        }
    }
}
