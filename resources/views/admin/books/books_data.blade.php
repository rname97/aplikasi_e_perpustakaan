@extends('admin.layouts.master')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Data Books</h5>
            <div class="dropdown">
                <a href="{{ url('/books_form_add') }}" class="btn btn-sm btn-primary"><i class='bx bxs-plus-square'></i>Tambah</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Deskripsi</th>
                    <th>Cover</th>
                    <th>kategori</th>
                    <th>Stok</th>
                    <th>Activate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($dataBooks as $rowBooks)
                    <tr>
                        <td><span class="fw-medium">{{ $rowBooks->bookJudul }}</span></td>
                        <td><span class="fw-medium">{{ $rowBooks->bookPenulis }}</span></td>
                        <td><span class="fw-medium">{{ $rowBooks->bookPenerbit }}</span></td>
                        <td><span class="fw-medium">{{ $rowBooks->bookDeskripsi }}</span></td>
                        <td><img style="height: 50px;width: 80px;"  src="{{url('images/'.$rowBooks->bookImageCover)}}"></td>
                        @foreach ($dataKategori as $rowKategori)
                            @if($rowBooks->kategori_id == $rowKategori->id )
                                <td>{{ $rowKategori->kategoriName }}</td>
                            @endif
                        @endforeach
                        <td><span class="fw-medium">{{ $rowBooks->bookStok }}</span></td>
                        <td><span class="fw-medium">{{ $rowBooks->bookActivate }}</span></td>
                        <td>
                            <a href="{{ url('/books_form_edit/'.$rowBooks->id) }}" class="btn btn-sm btn-secondary"><i class='bx bxs-plus-square'></i>edit</a>
                            <a href="{{ url('/deleteBooks/'.$rowBooks->id) }}" class="btn btn-sm btn-danger"><i class='bx bxs-plus-square'></i>delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- / Content -->

@endsection
