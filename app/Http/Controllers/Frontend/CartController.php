<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodOrder;
use App\Models\RestaurantTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend.cart.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        // return redirect()->route('cart.list');
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }


    public function cartOrderPayment()
    {

        $cartItems = \Cart::getContent();
        $restaurant_tables = RestaurantTable::all();

        return view('frontend.food_payment.select_payment', compact('cartItems', 'restaurant_tables'));

    }

    public function cartOrder(Request $request)
    {

//        return $request->all();

        $validator = Validator::make($request->all(), [
            'restaurant_table_number' => 'required',
            'payment_by' => 'required'

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please Select Table Name And Table Number',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        } else {
//                    return $request->all();
            if ($request->payment_by == 'payment_by_cash') {
//                return 'payment_by_cash';
                $cartItems = \Cart::getContent();
//                $cart_data =  json_decode($cartItems);

//                foreach ($cartItems as $cartItem) {
//                    $food_order = new FoodOrder();
//                    $food_order->food_name = $cartItem->name;
//                    $food_order->food_price = $cartItem->price;
//                    $food_order->food_qty = $cartItem->quantity;
//                    $food_order->food_image = $cartItem->attributes->image;
//                    $food_order->food_table = $request->restaurant_table_number;
//                    $food_order->food_payment_method = 'cash';
//                    $food_order->status = 'pending';
//                    $food_order->save();
//                }

                     $food_order = new FoodOrder();
                foreach ($cartItems as $cartItem) {

                    $name[] = $cartItem->name;
                    $price[] = $cartItem->price;
                    $quantity[] = $cartItem->quantity;
                    $image[] = $cartItem->attributes->image;
                }
                    $food_order->food_name = json_encode($name);
                    $food_order->food_price = json_encode($price);
                    $food_order->food_qty = json_encode($quantity);
                    $food_order->food_image = json_encode($image);
                    $food_order->food_table = $request->restaurant_table_number;
                    $food_order->food_payment_method = 'cash';
                    $food_order->status = 'pending';
                    $food_order->save();
//                }
                \Cart::clear();
                $notification = array(
                    'message' => ' Thanks for your Oder . Now we will review and confirm ..... just wait a moment',
                    'alert-type' => 'success'
                );
                return redirect()->route('home.index')->with($notification);
            } elseif ($request->payment_by == 'payment_by_cash') {
                return 'payment_by_cash';
            } else {
                return 'not ok';
            }

//            return $cartItems = \Cart::getContent();
        }
    }
}
