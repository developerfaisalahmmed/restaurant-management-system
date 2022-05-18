<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantFood;
use App\Models\RestaurantFoodCategory;
use App\Models\RestaurantTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Str;
use Validator;

class RestaurantFoodCategoryController extends Controller
{
    public function index()
    {
        $restaurant_food_categories = RestaurantFoodCategory::all();
        return view('backend.restaurant_food_categories.index', compact('restaurant_food_categories'));
    }

    public function Admin_Restaurant_Food_Category_Create()
    {
        return view('backend.restaurant_food_categories.create');

    }


    public function Admin_Restaurant_Food_Category_Store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'restaurant_food_category_name' => 'required|unique:restaurant_food_categories',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {
            $restaurant_food_category = new RestaurantFoodCategory();
            $restaurant_food_category->restaurant_food_category_name = $request->restaurant_food_category_name;
            $restaurant_food_category->restaurant_food_category_name_slug = Str::slug($request->restaurant_food_category_name);
            $image = $request->file('restaurant_food_category_image');
            if ($image) {
                $image_name = time() . uniqid() . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/category/'), $image_name);
                $restaurant_food_category->restaurant_food_category_image = "/uploads/category/" . $image_name;
            }
            $restaurant_food_category->restaurant_food_category_status = 1;

            $restaurant_food_category->save();
            $notification = array(
                'message' => 'Restaurant New Food Category Publish Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.food.category')->withErrors($validator)->withInput()->with($notification);
        }

    }

    public function Admin_Restaurant_Food_Category_Edit($id)
    {

        $restaurant_food_category = RestaurantFoodCategory::findOrFail($id);
        return view('backend.restaurant_food_categories.edit', compact('restaurant_food_category'));

    }


    public function Admin_Restaurant_Food_Category_Update(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'restaurant_food_category_name' => 'required',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {
            $restaurant_food_category = RestaurantFoodCategory::findOrFail($id);
            $restaurant_food_category->restaurant_food_category_name = $request->restaurant_food_category_name;
            $restaurant_food_category->restaurant_food_category_name_slug = Str::slug($request->restaurant_food_category_name);
            $image = $request->file('restaurant_food_category_image');
            if ($image) {
                $image_path = $restaurant_food_category->restaurant_food_category_image;
                @unlink(public_path($image_path));
                $image_name = time() . uniqid() . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/category/'), $image_name);
                $restaurant_food_category->restaurant_food_category_image = "/uploads/category/" . $image_name;
            }
            $restaurant_food_category->restaurant_food_category_status = 1;

            $restaurant_food_category->save();
            $notification = array(
                'message' => 'Restaurant New Food Category Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.food.category')->withErrors($validator)->withInput()->with($notification);
        }

    }


    public function Admin_Restaurant_Food_Category_Status($id){
        $restaurant_food_category = RestaurantFoodCategory::findOrFail($id);
        if ($restaurant_food_category->restaurant_food_category_status == 1) {
            $restaurant_food_category->restaurant_food_category_status = 0;
        } else {
            $restaurant_food_category->restaurant_food_category_status = 1;
        }
        $restaurant_food_category->save();
        $notification = array(
            'message' => 'Successfully Restaurant Food Category Status Done',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.restaurant.food.category')->withInput()->with($notification);

    }

    public function Admin_Restaurant_Food_Category_Delete($id){
        $restaurant_food_category = RestaurantFood::findOrFail($id);
        $image_path_delete = public_path($restaurant_food_category->restaurant_food_category_image);
        if (file_exists($image_path_delete)) {
            @unlink($image_path_delete);
        }
        $restaurant_food_category->delete();
        $notification = array(
            'message' => 'Successfully Restaurant Food Category Delete Done',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.restaurant.food.category')->withInput()->with($notification);

    }

}
