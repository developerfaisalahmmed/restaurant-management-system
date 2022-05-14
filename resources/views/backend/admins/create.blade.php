@extends('backend.layout.index')

@section('title', 'Restaurant Admin Create |')


@push('admin_need_css')
    {{-- plece here css link--}}

@endpush

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Total Restaurant  Admins
                    <span class="tools pull-right">
                <a href="{{route('admins')}}" class="fa fa-list"> Admin Lists </a>
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>

                <div class="panel-body">
                    <form role="form" action="{{route('admin.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name" placeholder="Name">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="email"> Email</label>
                            <input value="{{old('email')}}" name="email" type="email" class="form-control" id="email" placeholder="restaurant table name">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="user_name"> User Name</label>
                            <input value="{{old('user_name')}}" name="user_name" type="text" class="form-control" id="user_name" placeholder="user name">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('user_name'))?($errors->first('user_name')):''}}</div>

                        </div>
                        <div class="form-group">
                            <label for="password"> Password</label>
                            <input value="faisalresturent" name="password" type="number" class="form-control" id="password" placeholder="123456768">
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>

                        </div>

                        <div class="form-group">
                            <label for="restaurant_table_seat"> Admin Role</label>
                            <select class="form-control" name="role">
                                <option value="Super_Admin">Super Admin </option>
                                <option value="Chef_Admin"> Chef Admin </option>
                            </select>

                            <div style='color:red; padding: 0 5px;'>{{($errors->has('role'))?($errors->first('role')):''}}</div>

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
