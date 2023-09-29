@extends('admin.layouts.master')

@section('content')


<div id="project" class="row" >
    <div class="col-sm-12">


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($dataBooks as $rowBooks)
                <div class="col">
                    <div class="card mb-5 shadow-sm">

                        <img src="{{url('images/'.$rowBooks->bookImageCover)}}" class="img-fluid" alt="..." >


                        <div class="card-body">
                            <h6 class="card-title">{{$rowBooks->bookJudul}}</h6>
                            <p class="card-text">{{$rowBooks->bookDeskripsi}}</p>
                            <a href="{{ url('/peminjaman_books_form_add/'.$rowBooks->id) }}" class="btn btn-primary">Pinjam</a>
                            <a href="#" class="btn btn-primary">Keranjang</a>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
