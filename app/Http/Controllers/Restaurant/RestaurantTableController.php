<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class RestaurantTableController extends Controller
{
    public function index()
    {
        $restaurant_tables = RestaurantTable::all();
        return view('backend.restaurant_table.index', compact('restaurant_tables'));
    }

    public function Admin_Restaurant_Table_Create()
    {
        return view('backend.restaurant_table.create');

    }

    public function Admin_Restaurant_Table_Store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'restaurant_table_name' => 'required|unique:restaurant_tables',
            'restaurant_table_seat' => 'required',
            'restaurant_table_number' => 'required|unique:restaurant_tables',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {

            $restaurant_table = new RestaurantTable();
            $restaurant_table->restaurant_table_name = $request->restaurant_table_name;
            $restaurant_table->restaurant_table_seat = $request->restaurant_table_seat;
            $restaurant_table->restaurant_table_number = $request->restaurant_table_number;
            $restaurant_table->status = 1;
            $restaurant_table->save();
            $notification = array(
                'message' => 'Restaurant new table setup done',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.table')->withErrors($validator)->withInput()->with($notification);

        }
    }

    public function Admin_Restaurant_Table_Edit($id){
        $find_restaurant_table = RestaurantTable::findOrFail($id);
        return view('backend.restaurant_table.edit',compact('find_restaurant_table'));

    }

    public function Admin_Restaurant_Table_Update(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'restaurant_table_name' => 'required',
            'restaurant_table_seat' => 'required',
            'restaurant_table_number' => 'required',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {

            $find_restaurant_table_update = RestaurantTable::findOrFail($id);
            $find_restaurant_table_update->restaurant_table_name = $request->restaurant_table_name;
            $find_restaurant_table_update->restaurant_table_seat = $request->restaurant_table_seat;
            $find_restaurant_table_update->restaurant_table_number = $request->restaurant_table_number;
            $find_restaurant_table_update->status = 1;
            $find_restaurant_table_update->save();
            $notification = array(
                'message' => 'Successfully Restaurant Table Update Done',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.restaurant.table')->withErrors($validator)->withInput()->with($notification);

        }

    }

    public function Admin_Restaurant_Table_Status($id){
        $find_restaurant_table = RestaurantTable::findOrFail($id);
        if ($find_restaurant_table->status == 1) {
            $find_restaurant_table->status = 0;
        } else {
            $find_restaurant_table->status = 1;
        }
        $find_restaurant_table->save();
        $notification = array(
            'message' => 'Successfully Restaurant Table Status Done',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.restaurant.table')->withInput()->with($notification);

    }

    public function Admin_Restaurant_Table_Delete($id){
        $find_restaurant_table = RestaurantTable::findOrFail($id);
        $find_restaurant_table->delete();
        $notification = array(
            'message' => 'Successfully Restaurant Table Delete Done',
            'alert-type' => 'danger'
        );
        return redirect()->route('admin.restaurant.table')->withInput()->with($notification);

    }


}
