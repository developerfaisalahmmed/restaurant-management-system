<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\FoodOrder;
use App\Models\RestaurantTable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantFoodOrderController extends Controller
{
    public function index()
    {
        $data['restaurant_foods_orders'] = DB::table('food_orders')
            ->join('restaurant_tables', 'restaurant_tables.restaurant_table_number', 'food_orders.food_table')
            ->orderBy('id','DESC')
            ->select('food_orders.*', 'restaurant_tables.restaurant_table_number', 'restaurant_tables.restaurant_table_name', 'restaurant_tables.restaurant_table_seat')
            ->whereDate('food_orders.created_at', Carbon::today())
            ->get();


//        return $data['food_orders'];
        return view('backend.orders.orders', $data);
    }




    public function Admin_Restaurant_Food_Order_Details($id){

        $data['order_details'] = FoodOrder::findOrFail($id);

//        return $data['order_details'];
        $data['order_details_food_names'] = json_decode($data['order_details']->food_name);
        $data['order_details_food_prices'] = json_decode($data['order_details']->food_price);
        $data['order_details_food_qtys'] = json_decode($data['order_details']->food_qty);
        $data['order_details_food_images'] = json_decode($data['order_details']->food_image);
//        return  $data['order_details_food_names'];
        return view('backend.orders.details', $data);


    }
}
