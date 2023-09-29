<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function show(){
        // $kategori = Kategori::all();
        // $books = Books::all();
        $peminjaman = Peminjaman::all();
        $data = ['dataPeminjaman' => $peminjaman];

        // echo json_encode($kategori);
        return view('admin.peminjaman.peminjaman_data', $data);
    }

    public function viewAddPeminjaman($id){
        $kategori = Kategori::all();
        $books = Books::find($id);
        $data = ['rowBooks'=> $books, 'dataKategori' => $kategori];

        return view('admin.peminjaman.peminjaman_add', $data);
    }

    public function addPeminjaman(Request $request){



        $validator = Validator::make($request->all(), [
            'book_id' => 'required',
            'user_id' => 'required',
            'statusPeminjaman' => 'required',
            'waktuPeminjaman' => 'required',
            'waktuPengembalian' => 'required',

       ]);



       if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
       }else{
            $peminjaman = new Peminjaman();
            $peminjaman->book_id        = $request->book_id;
            $peminjaman->user_id        = $request->user_id;
            $peminjaman->statusPeminjaman        = $request->statusPeminjaman;
            $peminjaman->waktuPeminjaman        = $request->waktuPeminjaman;
            $peminjaman->waktuPengembalian        = $request->waktuPengembalian;



            $peminjaman->save();
            Session::flash('alert-class', 'alert-success');
            Session::flash('message','Record inserted successfully.');
         }
         return redirect('/peminjaman');
    }
}
