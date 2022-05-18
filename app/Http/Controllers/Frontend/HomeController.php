<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RestaurantFood;
use App\Models\RestaurantFoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
//        return $restaurant_foods;
        $restaurant_food_categories = DB::table('restaurant_food_categories')
            ->where('restaurant_food_category_status','1')
            ->get();
//        $restaurant_food_categories = DB::table('restaurant_food')
//            ->join('restaurant_food_categories','restaurant_food.restaurant_food_category_id','restaurant_food_categories.id')
//            ->where('restaurant_food_category_status','1')
//            ->get();

//return $restaurant_food_categories;

        return view('frontend.home',compact('restaurant_food_categories'));
    }






    public function Category_Items($category_name_slug){
        $restaurant_food_category = RestaurantFoodCategory::where('restaurant_food_category_name_slug',$category_name_slug)->first();
        $restaurant_category_foods = RestaurantFood::where('restaurant_food_category_id',$restaurant_food_category->id)->paginate(2);
//        return $restaurant_category_foods;
        return view('frontend.category_foods',compact('restaurant_food_category','restaurant_category_foods'));


    }



}
