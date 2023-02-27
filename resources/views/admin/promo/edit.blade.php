@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit {{$promo->title}}
                    Promo
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Promo</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="/admin/promo" class="btn btn-flex btn-light h-40px fs-7 fw-bold">Cancel</a>
                <button type="button" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                onclick="event.preventDefault();document.getElementById('edit-form').submit();">Update</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="edit-form" action="{{route('admin.update.promo', ['id' => $promo->id])}}" method="POST" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4 border">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Banner</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <style>
                            .image-input-placeholder {
                                background-image: url({{asset('storage/promo/'.$promo->thumbnail)}})
                            }
                        </style>
                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                            data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change file_promo"
                                data-bs-original-title="Change file_promo" data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="file_promo" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="file_promo">
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel file_promo"
                                data-bs-original-title="Cancel file_promo" data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove file_promo"
                                data-bs-original-title="Remove file_promo" data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                        <div class="text-muted fs-7">Set the banner image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4 border">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Detail</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="required form-label">Judul Promo</label>
                            <input type="text" name="title" class="form-control" value="{{$promo->title}}" required>
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="required form-label">Nama Vendor</label>
                            <input type="text" name="nama_vendor" class="form-control" value="{{$promo->nama_vendor}}" required>
                        </div>
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="{{$promo->deskripsi}}" required>
                        </div>
                        <div class="mb-10 d-flex flex-wrap gap-5">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <label class="required form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" value="{{$promo->tanggal_mulai}}" required>
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="required form-label">Tanggal Berakhir</label>
                                <input type="date" name="tanggal_akhir" class="form-control" value="{{$promo->tanggal_akhir}}" required>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div>
                            <label class="form-label">Artikel Promo</label>
                            <textarea id="artikel" name="artikel" class="form-control" data-kt-autosize="true">{{$promo->artikel}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
