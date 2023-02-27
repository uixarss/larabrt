@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit
                    {{$users->name}}</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Pengguna</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="/admin/user" class="btn btn-flex btn-light h-40px fs-7 fw-bold">Cancel</a>
                <button type="button" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                    onclick="event.preventDefault();document.getElementById('edit-form').submit();">Update</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="edit-form" action="{{route('admin.update.permission.user', ['id' => $users->id])}}" method="POST" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4 border">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Role</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <select name="roles[]" class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            @foreach($roles as $role)
                            <option value="{{$role->id}}" {{($users->hasRole($role->name)) ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card card-flush py-4 border">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Permission</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <select name="permissions[]" class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            @foreach($permissions as $permission)
                            <option value="{{$permission->id}}" {{($users->hasPermissionTo($permission->name)) ? 'selected' : ''}}>{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4 border">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row mb-5">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$users->name}}">
                        </div>
                        <div class="fv-row mb-5">
                            <label class="form-label" for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$users->email}}">
                        </div>
                        <div class="fv-row mb-5">
                            <label class="form-label" for="no_hp">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{$users->no_hp}}">
                        </div>
                        <div class="fv-row">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">None</option>
                                <option value="0" {{($users->status == 0) ? 'selected': ''}}>Tidak Aktif</option>
                                <option value="1" {{($users->status == 1) ? 'selected': ''}}>Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
