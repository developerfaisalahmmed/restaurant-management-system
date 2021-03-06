@extends('backend.layout.index')

@section('title', 'Restaurant New Food Create |')


@push('admin_need_css')
    {{-- plece here css link--}}

@endpush

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Total Restaurant Foods
                    <span class="tools pull-right">
                <a href="{{route('admin.restaurant.food')}}" class="fa fa-list"> Food Lists </a>
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>

                <div class="panel-body">
                    <form role="form" action="{{route('admin.restaurant.food.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="restaurant_food_name"> Restaurant Food Category Name</label>
                            <select class="form-control" name="restaurant_food_category_id" aria-label="restaurant_food_category_id">
                                @foreach($restaurant_food_categories as $restaurant_food_category)
                                <option value="{{$restaurant_food_category->id}}">{{$restaurant_food_category->restaurant_food_category_name}}</option>
                                @endforeach
                            </select>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_category_id'))?($errors->first('restaurant_food_category_id')):''}}</div>
                        </div>



                        <div class="form-group">
                            <label for="restaurant_food_name"> Restaurant Food Name</label>
                            <input value="{{old('restaurant_food_name')}}" name="restaurant_food_name" type="text"
                                   class="form-control" id="restaurant_food_name" placeholder="restaurant food name">
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_name'))?($errors->first('restaurant_food_name')):''}}</div>
                        </div>
                        <div class="form-group">
                            <label for="restaurant_food_price"> Restaurant Food Price</label>
                            <input value="{{old('restaurant_food_price')}}" name="restaurant_food_price"
                                   type="number" class="form-control" id="restaurant_food_price"
                                   placeholder="restaurant food price">
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_price'))?($errors->first('restaurant_food_price')):''}}</div>
                        </div>
                        <div class="form-group">
                            <label for="restaurant_food_quantity"> Restaurant Food Quantity</label>
                            <input value="{{old('restaurant_food_quantity')}}" name="restaurant_food_quantity"
                                   type="number" class="form-control" id="restaurant_food_quantity"
                                   placeholder="restaurant food quantity">
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_quantity'))?($errors->first('restaurant_food_quantity')):''}}</div>
                        </div>
                        <div class="form-group">
                            <label for="restaurant_food_image"> Restaurant Food Image</label>
                            <input value="{{old('restaurant_food_image')}}" name="restaurant_food_image" type="file"
                                   class="form-control" id="restaurant_food_image">
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_image'))?($errors->first('restaurant_food_image')):''}}</div>
                        </div>


                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->

@endsection


@push('admin_need_js')
    {{-- plece here js link--}}

@endpush
