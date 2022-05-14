@extends('backend.layout.index')

@section('title', 'Restaurant Foods Order Details |')


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
                    Foods Orders Details
                    <span class="tools pull-right">
{{--                <a href="{{route('admin.restaurant.food.create')}}" class="fa fa-plus">Add New</a>--}}
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>
                <div class="panel-body">
                    <table class="table">
                        <tbody>

                        <tr>
                            <th>Foods Order Number</th>
                                <td>
                                    {{$order_details->id}}
                                </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Foods Order Table Number</th>
                                <td>
                                    {{$order_details->food_table}}
                                </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Foods Order Payment By</th>
                            <td>
                                {{$order_details->food_payment_method}}
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Foods Order Status</th>
                            <td>
                                {{$order_details->status}}
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Foods Name</th>
                            @foreach($order_details_food_names as $order_details_food_name )
                                <td>
                                    {{$order_details_food_name}}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Foods Price</th>
                            @foreach($order_details_food_prices as $order_details_food_price )
                                <td>
                                    {{$order_details_food_price}}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Foods Qty</th>
                            @foreach($order_details_food_qtys as $order_details_food_qty )
                                <td>
                                    {{$order_details_food_qty}}
                                </td>

                            @endforeach
                        </tr>
                        <tr>
                            <th>Foods Image</th>
                            @foreach($order_details_food_images as $order_details_food_image )
                                <td>
                                    <img width="100px" height="100px"  src="{{$order_details_food_image}}">
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
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
@endpush
