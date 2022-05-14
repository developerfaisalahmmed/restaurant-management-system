@extends('frontend.layouts.index')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.layouts.partials.siteber')
            </div>
            <div class="col-md-9">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img height="400px" src="{{asset('frontend')}}/images/image (1).jpg" class="d-block w-100"
                                 alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="400px" src="{{asset('frontend')}}/images/image (2).jpg" class="d-block w-100"
                                 alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="400px" src="{{asset('frontend')}}/images/image (2).jpg" class="d-block w-100"
                                 alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bg-success p-2 "> Our Items</h2>
            </div>
        </div>
        <div class="row">
            @foreach($restaurant_foods as $restaurant_food)
                <div class="col-md-3">
                    <div class="card" >
                        <img src="{{$restaurant_food->restaurant_food_image}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="d-flex justify-content-between">
                                    {{$restaurant_food->restaurant_food_name}}
                                    <span
                                        class="btn btn-sm bg-success text-white">{{$restaurant_food->restaurant_food_quantity}}</span>
                                </div>

                            </h5>
                            <h4 class="card-title">Price: ${{$restaurant_food->restaurant_food_price}}</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $restaurant_food->id }}" name="id">
                                    <input type="hidden" value="{{ $restaurant_food->restaurant_food_name }}" name="name">
                                    <input type="hidden" value="{{ $restaurant_food->restaurant_food_price }}" name="price">
                                    <input type="hidden" value="{{ $restaurant_food->restaurant_food_image }}"  name="image">
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
        </div>
    </div>
@endsection
