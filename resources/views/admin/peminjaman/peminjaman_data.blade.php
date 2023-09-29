@extends('admin.layouts.master')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Data Kategori</h5>
            <div class="dropdown">
                {{-- <a href="{{ url('/kategori_form_add') }}" class="btn btn-sm btn-primary"><i class='bx bxs-plus-square'></i>Tambah</a> --}}
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Waktu Peminjaman</th>
                    <th>Waktu Pengembalian</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($dataPeminjaman as $rowPeminjaman)
                    <tr>
                        <td><span class="fw-medium">{{ $rowPeminjaman->user_id }}</span></td>
                        <td> <span class="fw-medium">{{ $rowPeminjaman->book_id }}</span></td>
                        <td> <span class="fw-medium">{{ $rowPeminjaman->statusPeminjaman }}</span></td>
                        <td> <span class="fw-medium">{{ $rowPeminjaman->waktuPeminjaman }}</span></td>
                        <td> <span class="fw-medium">{{ $rowPeminjaman->waktuPengembalian }}</span></td>
                        <td>
                            <a href="{{ url('/kategori_form_edit/'.$rowPeminjaman->id) }}" class="btn btn-sm btn-primary"><i class='bx bxs-plus-square'></i>Detail</a>
                            <a href="{{ url('/deleteKategori/'.$rowPeminjaman->id) }}" class="btn btn-sm btn-primary"><i class='bx bxs-plus-square'></i>Pengembalian</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- / Content -->

@endsection
