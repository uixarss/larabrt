@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit {{$halte->nama}}
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Edit Halte</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="/admin/halte" class="btn btn-flex btn-light h-40px fs-7 fw-bold">Cancel</a>
                <button type="button" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                    onclick="event.preventDefault();document.getElementById('edit-form').submit();">Update</a>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form id="edit-form" action="{{route('admin.update.halte', ['id' => $halte->id])}}" method="POST">
            @csrf
            <div class="card card-flush py-4 border">
                <div class="card-body">
                    <div class="mb-5 fv-row">
                        <label class="form-label" for="nama">Nama Halte</label>
                        <input type="text" class="form-control" name="nama" id="name" value="{{$halte->nama}}">
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input type="alamat" class="form-control" name="alamat" id="alamat" value="{{$halte->alamat}}">
                    </div>
                    <div class="mb-5 d-flex flex-wrap gap-5">
                        <div class="fv-row w-100 flex-md-root">
                            <label class="form-label" for="long">Longitude</label>
                            <input type="long" class="form-control" name="long" id="long" value="{{$halte->long}}">
                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <label class="form-label" for="lat">Latitude</label>
                            <input type="lat" class="form-control" name="lat" id="lat" value="{{$halte->lat}}">
                        </div>
                    </div>
                    <div class="mb-5 fv-row">
                        <label class="form-label" for="keterangan">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                            value="{{$halte->keterangan}}">
                    </div>
                    <div class="fv-row">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="0" {{($halte->status == false) ? 'selected': ''}}>Tidak Aktif</option>
                            <option value="1" {{($halte->status == true) ? 'selected': ''}}>Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
