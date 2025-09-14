<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Client;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::latest()->get();
        $clients = Client::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $categories = Category::all();

        // Handle service filtering
        $categoryId = $request->get('category');
        if ($categoryId) {
            $services = Service::where('category_id', $categoryId)->latest()->get();
        } else {
            $services = Service::latest()->get();
        }

        return view('home', compact('banners', 'clients', 'services', 'testimonials', 'categories', 'categoryId'));
    }
    
}
