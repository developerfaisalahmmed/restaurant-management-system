<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Restaurant\RestaurantFoodCategoryController;
use App\Http\Controllers\Restaurant\RestaurantFoodController;
use App\Http\Controllers\Restaurant\RestaurantFoodOrderController;
use App\Http\Controllers\Restaurant\RestaurantTableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
//


// Restaurant Admin Management
Route::get('/admin/login', [AdminController::class, 'Admin_Login'])->name('admin.login')->middleware('admin.login');
Route::post('/admin/login/check', [AdminController::class, 'Admin_login_Check'])->name('admin.login.check');
Route::get('/admin/dashboard', [AdminController::class, 'Admin_Dashboard'])->name('admin.dashboard')->middleware('admin.check');

Route::get('/admins', [AdminController::class, 'Admins'])->name('admins');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');


Route::get('/admin/create', [AdminController::class, 'Admin_Create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'Admin_Store'])->name('admin.store');
Route::get('/admin/edit/{id}', [AdminController::class, 'Admin_Edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'Admin_Store'])->name('admin.update');
Route::get('/admin/status/{id}', [AdminController::class, 'Admin_Status'])->name('admin.status');
Route::get('/admin/delete/{id}', [AdminController::class, 'Admin_Delete'])->name('admin.delete');





// Restaurant Table Management
Route::get('/restaurant/table', [RestaurantTableController::class, 'index'])->name('admin.restaurant.table');
Route::get('/create/restaurant/table', [RestaurantTableController::class, 'Admin_Restaurant_Table_Create'])->name('admin.restaurant.table.create');
Route::post('/save/restaurant/table', [RestaurantTableController::class, 'Admin_Restaurant_Table_Store'])->name('admin.restaurant.table.store');
Route::get('/restaurant/{id}/number/table/edit', [RestaurantTableController::class, 'Admin_Restaurant_Table_Edit'])->name('admin.restaurant.table.edit');
Route::post('/restaurant/{id}/number/table/update', [RestaurantTableController::class, 'Admin_Restaurant_Table_Update'])->name('admin.restaurant.table.update');
Route::get('/restaurant/{id}/number/table/delete', [RestaurantTableController::class, 'Admin_Restaurant_Table_Delete'])->name('admin.restaurant.table.delete');
Route::get('/restaurant/{id}/number/table/status', [RestaurantTableController::class, 'Admin_Restaurant_Table_Status'])->name('admin.restaurant.table.status');




// Restaurant Foods Management
Route::get('/restaurant/food', [RestaurantFoodController::class, 'index'])->name('admin.restaurant.food');
Route::get('/create/restaurant/food', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Create'])->name('admin.restaurant.food.create');
Route::post('/save/restaurant/food', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Store'])->name('admin.restaurant.food.store');
Route::get('/restaurant/{id}/number/food/edit', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Edit'])->name('admin.restaurant.food.edit');
Route::post('/restaurant/{id}/number/food/update', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Update'])->name('admin.restaurant.food.update');
Route::get('/restaurant/{id}/number/food/delete', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Delete'])->name('admin.restaurant.food.delete');
Route::get('/restaurant/{id}/number/food/status', [RestaurantFoodController::class, 'Admin_Restaurant_Food_Status'])->name('admin.restaurant.food.status');




// Restaurant Foods Categories Management
Route::get('/restaurant/food/categories', [RestaurantFoodCategoryController::class, 'index'])->name('admin.restaurant.food.category');
Route::get('/create/restaurant/food/category', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Create'])->name('admin.restaurant.food.category.create');
Route::post('/save/restaurant/food/category', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Store'])->name('admin.restaurant.food.category.store');
Route::get('/restaurant/{id}/number/food/category/edit', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Edit'])->name('admin.restaurant.food.category.edit');
Route::post('/restaurant/{id}/number/food/category/update', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Update'])->name('admin.restaurant.food.category.update');
Route::get('/restaurant/{id}/number/food/category/delete', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Delete'])->name('admin.restaurant.food.category.delete');
Route::get('/restaurant/{id}/number/food/category/status', [RestaurantFoodCategoryController::class, 'Admin_Restaurant_Food_Category_Status'])->name('admin.restaurant.food.category.status');














// Restaurant Foods Management
Route::get('/restaurant/food/order', [RestaurantFoodOrderController::class, 'index'])->name('admin.restaurant.food.order');
Route::get('/restaurant/food/{id}/number/order/details', [RestaurantFoodOrderController::class, 'Admin_Restaurant_Food_Order_Details'])->name('admin.restaurant.food.order.details');



// Frontend Management
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/select/payment', [CartController::class, 'cartOrderPayment'])->name('cart.order.payment');
Route::post('/cart/order', [CartController::class, 'cartOrder'])->name('cart.order');





Route::get('/{category_name_slug}', [HomeController::class, 'Category_Items'])->name('category.items');
