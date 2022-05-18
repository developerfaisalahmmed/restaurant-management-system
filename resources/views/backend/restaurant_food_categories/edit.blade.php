@extends('backend.layout.index')

@section('title', 'Restaurant Food Category Edit |')


@push('admin_need_css')
    {{-- plece here css link--}}

@endpush

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  {{$restaurant_food_category->id}} Number Restaurant Food Category Edit
                    <span class="tools pull-right">
                <a href="{{route('admin.restaurant.food.category')}}" class="fa fa-list"> Category Lists </a>
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>

                <div class="panel-body">
                    <form role="form" action="{{route('admin.restaurant.food.category.update',$restaurant_food_category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="restaurant_food_category_name"> Restaurant Food Category Name</label>
                            <input value="{{$restaurant_food_category->restaurant_food_category_name}}" name="restaurant_food_category_name" type="text" class="form-control" id="restaurant_food_category_name" placeholder="restaurant table name">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_category_name'))?($errors->first('restaurant_food_category_name')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="restaurant_food_category_image"> Restaurant Food Category Image</label>
                            <input value="{{old('restaurant_food_category_image')}}" name="restaurant_food_category_image" type="file"
                                   class="form-control" id="restaurant_food_category_image">
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_food_category_image'))?($errors->first('restaurant_food_category_image')):''}}</div>
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
