@extends('frontend.layouts.index')


@section('content')

    <div class="container pt-4">

        <div class="row">
            <div class="col-md-12">
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
            <div class="col-md-12">
                <div class="d-flex justify-content-between">

                    <div>
                        Total: ${{ Cart::getTotal() }}

                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-success">Remove All Cart</button>
                        </form>
                    </div>
                    <div>
                        Total: ${{ Cart::getTotal() }}
                        <br>
                        <a href="{{route('cart.order.payment')}}" class="btn btn-sm btn-success"> Continue Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
