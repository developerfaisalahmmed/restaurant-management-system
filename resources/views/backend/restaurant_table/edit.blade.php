@extends('backend.layout.index')

@section('title', 'Restaurant Table Edit |')


@push('admin_need_css')
    {{-- plece here css link--}}

@endpush

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  {{$find_restaurant_table->id}} Number Restaurant Table Edit
                    <span class="tools pull-right">
                <a href="{{route('admin.restaurant.table')}}" class="fa fa-list"> Table Lists </a>
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>

                <div class="panel-body">
                    <form role="form" action="{{route('admin.restaurant.table.update',$find_restaurant_table->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="restaurant_table_number"> Restaurant Table Number</label>
                            <input value="{{$find_restaurant_table->restaurant_table_number}}" name="restaurant_table_number" type="number" class="form-control" id="restaurant_table_number" placeholder="restaurant table number">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_table_number'))?($errors->first('restaurant_table_number')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="restaurant_table_name"> Restaurant Table Name</label>
                            <input value="{{$find_restaurant_table->restaurant_table_name}}" name="restaurant_table_name" type="text" class="form-control" id="restaurant_table_name" placeholder="restaurant table name">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_table_name'))?($errors->first('restaurant_table_name')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="restaurant_table_seat"> Restaurant Table Seat</label>
                            <input value="{{$find_restaurant_table->restaurant_table_seat}}" name="restaurant_table_seat" type="number" class="form-control" id="restaurant_table_seat" placeholder="restaurant table seat">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('restaurant_table_seat'))?($errors->first('restaurant_table_seat')):''}}</div>

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
