@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit Armada {{$armada->nama}}
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Armada</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="/admin/armada" class="btn btn-flex btn-light h-40px fs-7 fw-bold">Cancel</a>
                <button type="button" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" onclick="event.preventDefault();document.getElementById('edit-form').submit();">Update</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="edit-form" action="{{route('admin.update.armada', ['id' => $armada->id])}}" method="POST">
            @csrf
            <div class="card card-flush py-4 border">
                <div class="card-body">
                    <div class="mb-5 fv-row">
                        <label class="form-label">Nama Armada</label>
                        <input type="text" name="nama" class="form-control" value="{{$armada->nama}}" required>
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label">Kode Armada</label>
                        <input type="text" name="kode_armada" class="form-control" value="{{$armada->kode_armada}}" required>
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label">No Polisi</label>
                        <input type="text" name="no_polisi" class="form-control" value="{{$armada->no_polisi}}">
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label">No STNK</label>
                        <input type="text" name="no_stnk" class="form-control" value="{{$armada->no_stnk}}">
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label">No BPKB</label>
                        <input type="text" name="no_bpkb" class="form-control" value="{{$armada->no_bpkb}}">
                    </div>
                    <div class="fv-row">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{$armada->keterangan}}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
