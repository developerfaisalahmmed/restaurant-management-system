@extends('backend.layout.index')

@section('title', 'Restaurant Foods Orders |')


@push('admin_need_css')
    {{-- plece here css link--}}
    <!--dynamic table-->

    <link href="{{asset('backend')}}/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet"/>
    <link href="{{asset('backend')}}/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('backend')}}/assets/data-tables/DT_bootstrap.css"/>
@endpush

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Foods Orders
                    <span class="tools pull-right">
{{--                <a href="{{route('admin.restaurant.food.create')}}" class="fa fa-plus">Add New</a>--}}
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th> Order Table </th>
                                <th>Order Payment By</th>
                                <th>Order Status</th>
                                <th>Order Place Time</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant_foods_orders as $key=>$restaurant_foods_order)
                                <tr class="gradeX">
                                    <td>{{$key+1}}</td>
                                    <td>{{$restaurant_foods_order->food_table}}</td>
                                    <td>{{$restaurant_foods_order->food_payment_method}}</td>
                                    <td>
                                        @if($restaurant_foods_order->status == 'pending')
                                           <img width="300px" height="70px" src="{{asset('backend/img')}}/new-order.gif"/>
                                        @else
                                            Old Orders
                                        @endif
                                    </td>
                                    <td> {{ \Carbon\Carbon::parse($restaurant_foods_order->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a class="p-5"
                                           href="{{route('admin.restaurant.food.order.details',$restaurant_foods_order->id)}}"><i
                                                class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th> Order Table </th>
                                <th>Order Payment By</th>
                                <th>Order Status</th>
                                <th>Order Place Time</th>
                                <th> Action</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->

@endsection


@push('admin_need_js')
    {{-- plece here js link--}}
    <!--dynamic table initialization -->

    <script type="text/javascript" language="javascript"
            src="{{asset('backend')}}/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{asset('backend')}}/assets/data-tables/DT_bootstrap.js"></script>
    <script src="{{asset('backend')}}/js/dynamic_table_init.js"></script>

    <script>
        window.setTimeout( function() {
            window.location.reload();
        }, 30000);
    </script>
@endpush
