<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a class="active" href="{{route('admin.dashboard')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php

        if (Session::has('adminId')) {
            $admin =  App\Models\Admin::where('id', '=', Session::get('adminId'))->first();
        }
        ?>
        @if(Session::has('adminId'))

        @if($admin->role == "Super_Admin")
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Restaurant Tables</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.restaurant.table')}}">Index</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Foods Categories </span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.restaurant.food.category')}}">Index</a></li>
                </ul>
            </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Restaurant Foods</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.restaurant.food')}}">Index</a></li>
                    </ul>
                </li>


                <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Restaurant Order Foods</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.restaurant.food.order')}}">Index</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Restaurant Admins </span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admins')}}">Admins</a></li>
                </ul>
            </li>
        @elseif($admin->role == "Chef_Admin")
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Restaurant Order Foods</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.restaurant.food.order')}}">Index</a></li>
                </ul>
            </li>
        @endif
        @endif
    </ul>
    <!-- sidebar menu end-->
</div>
