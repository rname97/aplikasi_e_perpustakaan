@extends('admin.layouts.master')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic Layout</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/submitEditBooks') }}/{{ $rowBooks->id }}" enctype="multipart/form-data">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Judul</label>
                <div class="col-sm-10">
                  <input type="text" name="bookJudul" class="form-control"  id="basic-default-name" value="{{$rowBooks->bookJudul}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookPenulis</label>
                <div class="col-sm-10">
                  <input type="text" name="bookPenulis" class="form-control" id="basic-default-company" value="{{$rowBooks->bookJudul}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookPenerbit</label>
                <div class="col-sm-10">
                  <input type="text" name="bookPenerbit" class="form-control" id="basic-default-company" value="{{$rowBooks->bookJudul}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookDeskripsi</label>
                <div class="col-sm-10">
                  <input type="text" name="bookDeskripsi" class="form-control" id="basic-default-company" value="{{$rowBooks->bookJudul}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookImageCover</label>
                <div class="col-sm-10">
                  <input type="file" name="bookImageCover" class="form-control" id="basic-default-company"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Current Image</label>
                <div class="col-sm-10">
                @if ($rowBooks->bookImageCover != '')
                    <input type="hidden" name="bookImageCoverCurent" class="form-control" id="basic-default-name" value="{{ $rowBooks->bookImageCover }}">
                    <img src="{{url('images/'.$rowBooks->bookImageCover)}}" alt="" width="100" height="100">
                @else
                    <img src="{{url('public/Image/img_not_found.jpg')}}" alt="">
                @endif
            </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">kategori_id</label>
                <div class="col-sm-10">
                    <select id="defaultSelect" class="form-control" name="kategori_id">
                        <option>Default select</option>
                        @foreach($dataKategori as $rowKategori)
                        <option value="{{ $rowKategori->id }}" {{ $rowBooks->kategori_id == $rowKategori->id ? "selected" : '' }}> {{  $rowKategori->kategoriName  }}</option>
                        @endforeach
                    </select>
                  {{-- <input type="text" name="kategori_id" class="form-control" id="basic-default-company" placeholder="ACME Inc." /> --}}
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookStok</label>
                <div class="col-sm-10">
                  <input type="text" name="bookStok" class="form-control" id="basic-default-company" value="{{$rowBooks->bookStok}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">bookActivate</label>
                <div class="col-sm-10">
                    <select id="defaultSelect" class="form-control" name="bookActivate">
                        <option>Default select</option>
                        <option value="activate" {{ $rowBooks->bookActivate == "activate" ? "selected" : '' }}>Activate</option>
                        <option value="noactivate" {{ $rowBooks->bookActivate == "noactivate" ? "selected" : '' }}>No Activate</option>
                    </select>
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Basic with Icons -->

    </div>

  <!-- / Content -->

@endsection
