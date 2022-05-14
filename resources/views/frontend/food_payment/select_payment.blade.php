@extends('frontend.layouts.index')


@section('content')

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartItems as $key=>$item)
                        <tr>
                            <th scope="row">{{$key+0}}</th>
                            <td>{{ $item->name }}</td>
                            <td><img width="100px" height="50px" src="{{ $item->attributes->image }}"></td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id}}">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                           class=""/>
                                    <button type="submit" class="btn btn-sm btn-info">update</button>
                                </form>
                            </td>
                            <td>${{ $item->price }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="btn btn-sm btn-success">x</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">

                Total: ${{ Cart::getTotal() }}


                <form action="{{ route('cart.order') }}" method="POST">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_by" value="payment_by_cash"
                               id="payment_by_cash" checked>
                        <label class="form-check-label" for="payment_by_cash">
                            Cash
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_by" value="payment_by_stripe"
                               id="payment_by_stripe">
                        <label class="form-check-label" for="payment_by_stripe">
                            Stripe
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="product_discount_type">Select Your Table </label>

                        <select class="form-select" aria-label="Select Your Table" name="restaurant_table_number">

                            @foreach($restaurant_tables as $restaurant_table)
                                <option value="{{$restaurant_table->restaurant_table_number}}"> Table
                                    Name: {{$restaurant_table->restaurant_table_name}} || Table
                                    Number: {{$restaurant_table->restaurant_table_number}}</option>
                            @endforeach
                            <div
                                style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_table_number'))?($errors->first('restaurant_table_number')):''}}</div>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-sm btn-success"> Continue Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection
