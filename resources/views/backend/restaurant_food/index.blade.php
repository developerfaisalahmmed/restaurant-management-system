@extends('backend.layout.index')

@section('title', 'Restaurant Foods |')


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
                    Total Restaurant Foods
                    <span class="tools pull-right">
                <a href="{{route('admin.restaurant.food.create')}}" class="fa fa-plus">Add New</a>
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
                                <th>Food Name</th>
                                <th>Food Qty</th>
                                <th>Food Image</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant_foods as $key=>$restaurant_food)
                                <tr class="gradeX">
                                    <td>{{$key+1}}</td>
                                    <td>{{$restaurant_food->restaurant_food_name}}</td>
                                    <td>{{$restaurant_food->restaurant_food_quantity}}</td>
                                    <td><img class="float-end" height="100px" src="{{$restaurant_food->restaurant_food_image}}"></td>
                                    <td>
                                        @if($restaurant_food->status == 1)
                                            <a class="p-5"
                                               href="{{route('admin.restaurant.food.status',$restaurant_food->id)}}"><i
                                                    class="fa fa-thumbs-up"></i> </a>
                                        @else
                                            <a class="p-5"
                                               href="{{route('admin.restaurant.food.status',$restaurant_food->id)}}"><i
                                                    class="fa fa-thumbs-down"></i> </a>

                                        @endif
                                        <a class="p-5"
                                           href="{{route('admin.restaurant.food.edit',$restaurant_food->id)}}"><i
                                                class="fa fa-edit"></i> </a>
                                        <a class="p-5"
                                           href="{{route('admin.restaurant.food.delete',$restaurant_food->id)}}"><i
                                                class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Food Name</th>
                                <th>Food Qty</th>
                                <th>Food Image</th>
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
@endpush
