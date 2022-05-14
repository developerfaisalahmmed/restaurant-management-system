<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RestaurantFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $restaurant_foods = DB::table('restaurant_food')->orderBy('id','DESC')->where('status','1')->get();
//        return $restaurant_foods;
        return view('frontend.home',compact('restaurant_foods'));
    }
}
