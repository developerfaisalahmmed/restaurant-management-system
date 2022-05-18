@extends('backend.layout.index')

@section('title', 'Restaurant Food Categories |')


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
                    Total Restaurant Foods Categories
                    <span class="tools pull-right">
                <a href="{{route('admin.restaurant.food.category.create')}}" class="fa fa-plus">Add New</a>
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
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant_food_categories as $key=>$restaurant_food_category)
                                <tr class="gradeX">
                                    <td>{{$key+1}}</td>
                                    <td>{{$restaurant_food_category->restaurant_food_category_name}}</td>
                                    <td><img width="300px" height="270px" src="{{$restaurant_food_category->restaurant_food_category_image}}"></td>
                                    <td>
                                        @if($restaurant_food_category->restaurant_food_category_status == 1)
                                            <a class="p-5"
                                               href="{{route('admin.restaurant.food.category.status',$restaurant_food_category->id)}}"><i
                                                    class="fa fa-thumbs-up"></i> </a>
                                        @else
                                            <a class="p-5"
                                               href="{{route('admin.restaurant.food.category.status',$restaurant_food_category->id)}}"><i
                                                    class="fa fa-thumbs-down"></i> </a>

                                        @endif
                                        <a class="p-5"
                                           href="{{route('admin.restaurant.food.category.edit',$restaurant_food_category->id)}}"><i
                                                class="fa fa-edit"></i> </a>
                                        <a class="p-5"
                                           href="{{route('admin.restaurant.food.category.delete',$restaurant_food_category->id)}}"><i
                                                class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
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
