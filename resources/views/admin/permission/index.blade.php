@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Data
                    Permission</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">List Permission</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal"
                    data-bs-target="#create_modal">Tambah Permission</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card border">
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>Name</th>
                            <th class="text-end">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td class="text-end">
                                <button class="btn btn-icon btn-warning btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#edit_modal{{$permission->id}}">
                                    <i class="bi bi-pencil-square fs-3"></i>
                                </button>
                                <a href="{{route('admin.delete.permission', [ 'id' => $permission->id ])}}"
                                    class="btn btn-icon btn-danger btn-sm">
                                    <i class="bi bi-trash3 fs-3"></i>
                                </a>
                            </td>
                            <div class="modal fade" tabindex="-1" id="edit_modal{{$permission->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('admin.update.permission',['id' => $permission->id])}}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h3 class="modal-title">Edit Permission</h3>
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="bi bi-x fs-3"></i>
                                                </div>
                                            </div>

                                            <div class="modal-body">
                                                <div class="fv-row">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{$permission->name}}">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="create_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.create.permission')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Permission</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="bi bi-x fs-3"></i>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="fv-row">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
