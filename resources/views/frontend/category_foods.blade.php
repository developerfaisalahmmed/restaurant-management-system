@extends('frontend.layouts.index')


@section('content')

    <div class="container pt-4">
        <div class="row  py-3">
            <div class="col-md-12">
                <h2 class="bg-success p-2 text-white"><strong>
                        <i>{{$restaurant_food_category->restaurant_food_category_name}}</i> </strong></h2>
            </div>
        </div>
        @if($restaurant_category_foods->isNotEmpty())
            <div class="row">
                @foreach($restaurant_category_foods as $restaurant_category_food)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{$restaurant_category_food->restaurant_food_image}}"
                                 class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="d-flex justify-content-between">
                                        {{$restaurant_category_food->restaurant_food_name}}
                                        <span
                                            class="btn btn-sm bg-success text-white">{{$restaurant_category_food->restaurant_food_quantity}}</span>
                                    </div>

                                </h5>
                                <h4 class="card-title">Price: ${{$restaurant_category_food->restaurant_food_price}}</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of
                                    the card's content.</p>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('cart.store') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $restaurant_category_food->id }}" name="id">
                                        <input type="hidden"
                                               value="{{ $restaurant_category_food->restaurant_food_name }}"
                                               name="name">
                                        <input type="hidden"
                                               value="{{ $restaurant_category_food->restaurant_food_price }}"
                                               name="price">
                                        <input type="hidden"
                                               value="{{ $restaurant_category_food->restaurant_food_image }}"
                                               name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-success">Add To Cart</button>
                                        {{--                                    <a href="#" class="btn btn-success"> Add to Cart </a>--}}
                                    </form>
                                    <a href="#" class="btn btn-sm btn-success"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p class="p-3"> {{$restaurant_category_foods->links()}}</p>
            </div>
        @else
            <div class="col-md-12 mt-5">
                <div class="alert alert-success" role="alert">
                    <p class="text-center">Opss!! No Items in your Selection {{$restaurant_food_category->restaurant_food_category_name}} </p>
                </div>
            </div>
        @endif
    </div>
@endsection
