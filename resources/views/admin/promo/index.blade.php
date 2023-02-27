@extends('layouts.dashboard')

@section('content')
<div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Data Promo
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">List Promo</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal"
                    data-bs-target="#create_modal">Tambah Promo</a>
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
                            <th>No</th>
                            <th>Nama Vendor</th>
                            <th>Judul Promo</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Status</th>
                            <th class="text-end">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach($data_promo as $no => $promo)
                        <tr>
                            <td>{{++$no}}</td>
                            <td>{{$promo->nama_vendor}}</td>
                            <td>{{$promo->title}}</td>
                            <td>{{$promo->deskripsi}}</td>
                            <td>{{$promo->tanggal_mulai}}</td>
                            <td>{{$promo->tanggal_akhir}}</td>
                            <td>{{($promo->status == true) ? 'Aktif' : 'Tidak Aktif'}}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    @if(auth()->user()->can('edit-promo'))
                                    <div class="menu-item px-3">
                                        <a href="{{route('admin.edit.promo', [ 'id' => $promo->id ])}}"
                                            class="menu-link px-3">Edit</a>
                                    </div>
                                    @endif
                                    @if(auth()->user()->can('delete-promo'))
                                    <div class="menu-item px-3">
                                        <a href="{{route('admin.delete.promo', [ 'id' => $promo->id ])}}"
                                            class="menu-link px-3">Delete</a>
                                    </div>
                                    @endif
                                </div>
                            </td>
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
            <form action="{{route('admin.store.promo')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Promo</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="bi bi-x fs-3"></i>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nama Vendor</label>
                                <input type="text" name="nama_vendor" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-line">
                                <label class="form-label">Judul Promo</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-line">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control">
                            </div>
                            <br>
                            <div class="form-line">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-line">
                                <label class="form-label">Tanggal Berakhir</label>
                                <input type="date" name="tanggal_akhir" class="form-control" required>
                            </div>
                            <br>
                            <div class="form-line">
                                <label class="form-label">Gambar Promo</label>
                                <input type="file" name="file_promo" class="form-control" required>
                            </div>
                        </div>
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
