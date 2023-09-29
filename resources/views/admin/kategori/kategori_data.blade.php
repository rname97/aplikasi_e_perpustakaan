@extends('admin.layouts.master')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Data Kategori</h5>
            <div class="dropdown">
                <a href="{{ url('/kategori_form_add') }}" class="btn btn-sm btn-primary"><i class='bx bxs-plus-square'></i>Tambah</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Deskripsi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($kategori as $rowKategori)
                    <tr>
                        <td>
                            <span class="fw-medium">{{ $rowKategori->kategoriName }}</span>
                        </td>
                        <td>
                            <span class="fw-medium">{{ $rowKategori->kategoriDeskripsi }}</span>
                        </td>
                        <td>
                            <a href="{{ url('/kategori_form_edit/'.$rowKategori->id) }}" class="btn btn-sm btn-secondary"><i class='bx bxs-plus-square'></i>edit</a>
                            <a href="{{ url('/deleteKategori/'.$rowKategori->id) }}" class="btn btn-sm btn-danger"><i class='bx bxs-plus-square'></i>delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- / Content -->

@endsection
