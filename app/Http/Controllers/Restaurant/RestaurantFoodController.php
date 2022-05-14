<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantFood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
class RestaurantFoodController extends Controller
{
    public function index()
    {
        $restaurant_foods = RestaurantFood::all();
        return view('backend.restaurant_food.index', compact('restaurant_foods'));
    }

    public function Admin_Restaurant_Food_Create()
    {
        return view('backend.restaurant_food.create');

    }

    public function Admin_Restaurant_Food_Store(Request $request)
    {

//        return $request->all();

        $validator = Validator::make($request->all(), [
            'restaurant_food_name' => 'required|unique:restaurant_food',
            'restaurant_food_quantity' => 'required',
            'restaurant_food_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {

            $restaurant_food = new RestaurantFood();
            $restaurant_food->restaurant_food_name = $request->restaurant_food_name;
            $restaurant_food->restaurant_food_quantity = $request->restaurant_food_quantity;
            $restaurant_food->restaurant_food_price = $request->restaurant_food_price;
            if ($request->file('restaurant_food_image')) {
                $restaurant_food_image = $request->file('restaurant_food_image');
                $extension = $restaurant_food_image->getClientOriginalExtension();
                $restaurant_food_image_name = "restaurant_food_image_" . time() . "." . $extension;
                $restaurant_food_image->move(public_path('/uploads/foods/'), $restaurant_food_image_name);
                $restaurant_food->restaurant_food_image = "/uploads/foods/" . $restaurant_food_image_name;
            }
            $restaurant_food->status = 1;
            $restaurant_food->save();
            $notification = array(
                'message' => 'Restaurant new food item List Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.food')->withErrors($validator)->withInput()->with($notification);

        }
    }

    public function Admin_Restaurant_Food_Edit($id){
        $find_restaurant_food = RestaurantFood::findOrFail($id);
        return view('backend.restaurant_food.edit',compact('find_restaurant_food'));

    }

    public function Admin_Restaurant_Food_Update(Request $request,$id){


        $validator = Validator::make($request->all(), [
            'restaurant_food_name' => 'required',
            'restaurant_food_quantity' => 'required',
            'restaurant_food_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {

            $find_restaurant_food_update = RestaurantFood::findOrFail($id);
            $find_restaurant_food_update->restaurant_food_name = $request->restaurant_food_name;
            $find_restaurant_food_update->restaurant_food_quantity = $request->restaurant_food_quantity;
            $find_restaurant_food_update->restaurant_food_price = $request->restaurant_food_price;
            if ($request->file('restaurant_food_image')) {
                $image_path_delete = public_path($find_restaurant_food_update->restaurant_food_image);
                if (file_exists($image_path_delete)) {
                    @unlink($image_path_delete);
                }

                $restaurant_food_image = $request->file('restaurant_food_image');
                $extension = $restaurant_food_image->getClientOriginalExtension();
                $restaurant_food_image_name = "restaurant_food_image_" . time() . "." . $extension;
                $restaurant_food_image->move(public_path('/uploads/foods/'), $restaurant_food_image_name);
                $find_restaurant_food_update->restaurant_food_image = "/uploads/foods/" . $restaurant_food_image_name;
            }
            $find_restaurant_food_update->status = 1;
            $find_restaurant_food_update->save();
            $notification = array(
                'message' => 'Successfully Restaurant food Update Done',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.food')->withErrors($validator)->withInput()->with($notification);

        }

    }

    public function Admin_Restaurant_Food_Status($id){
        $find_restaurant_food = RestaurantFood::findOrFail($id);
        if ($find_restaurant_food->status == 1) {
            $find_restaurant_food->status = 0;
        } else {
            $find_restaurant_food->status = 1;
        }
        $find_restaurant_food->save();
        $notification = array(
            'message' => 'Successfully Restaurant food Status Done',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.restaurant.food')->withInput()->with($notification);

    }

    public function Admin_Restaurant_Food_Delete($id){
        $find_restaurant_food = RestaurantFood::findOrFail($id);
        $image_path_delete = public_path($find_restaurant_food->restaurant_food_image);
        if (file_exists($image_path_delete)) {
            @unlink($image_path_delete);
        }
        $find_restaurant_food->delete();
        $notification = array(
            'message' => 'Successfully Restaurant food Delete Done',
            'alert-type' => 'danger'
        );
        return redirect()->route('admin.restaurant.food')->withInput()->with($notification);

    }

}
