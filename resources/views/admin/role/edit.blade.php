{{-- @extends('layouts.admin')
@section('css-add')
<!-- JQuery DataTable Css -->
<link href="{{asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="bg-white">
        <div class="breadcrumb">
            <li>
                <a href="{{route('home')}} ">
                    <i class="material-icons">home</i>
                    Dashboard
                </a>
            </li>
            <li class="active">
                <a href="{{route('admin.list.role')}}">
                    <i class="material-icons">people</i>
                    Role Management
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">people</i>
                    Edit Role
                </a>
            </li>

        </div>
    </div>

    <!-- END PAGE TITLE -->

    <div class="row clearfix">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h4>Roles {{$role->name ?? ''}}</h4>
                        </div>

                    </div>
                </div>

                <div class="body">
                @include('layouts.alert')
                    <form action="{{route('admin.update.role',[ 'id' => $role->id])}}" method="post">
                        @csrf


                        <div class="row clearfix">

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                                        <label class="form-label">Name</label>
                                    </div>

                                    @foreach($permissions as $key => $permission)

                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="permission_name[]" value="{{$permission ?? ' '}}" class="filled-in" id="ig_checkbox{{$permission ?? ' '}}" {{ in_array($permission, $hasPermission) ? 'checked' : ' ' }}>
                                            <label for="ig_checkbox{{$permission ?? ' '}}"></label>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{$permission ?? ' ' }}" disabled>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>


                        </div>



                        <button type="submit" class="btn btn-primary waves-effect">Save</button>


                    </form>
                </div>



            </div>
        </div>



    </div>
</div>
@endsection --}}

@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit {{$role->name ?? ''}}</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Role</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="/admin/role" class="btn btn-flex btn-light h-40px fs-7 fw-bold">Cancel</a>
                <button type="button" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                    onclick="event.preventDefault();document.getElementById('edit-form').submit();">Update</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="edit-form" action="{{route('admin.update.role',[ 'id' => $role->id])}}" method="POST">
            @csrf
            <div class="card card-flush py-4 border">
                <div class="card-body">
                    <div class="fv-row mb-5">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                    </div>
                    <div class="fv-row mb-5">
                        <label class="form-label">Name</label>
                        <select name="permission_name[]" class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            @foreach($permissions as $key => $permission)
                            <option value="{{$permission ?? ' '}}" {{ in_array($permission, $hasPermission) ? 'selected' : ' ' }}>{{$permission ?? ' '}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
