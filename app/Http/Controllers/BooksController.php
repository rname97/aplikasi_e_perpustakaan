<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    public function show(){
        $kategori = Kategori::all();
        $books = Books::all();
        $data = ['dataBooks'=> $books, 'dataKategori' => $kategori];

        // echo json_encode($kategori);
        return view('admin.books.books_data', $data);
    }

    public function viewAddBooks(){
        $kategori = Kategori::all();
        return view('admin.books.books_add', ['kategori'=>$kategori]);
    }

    public function addBooks(Request $request){
        $validator = Validator::make($request->all(), [
            'bookJudul' => 'required',
            'bookPenulis' => 'required',
            'bookPenerbit' => 'required',
            'bookDeskripsi' => 'required',
            'bookImageCover.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'bookStok' => 'required',
            'bookActivate' => 'required',
       ]);

       $filename = '';

        if($request->hasFile('bookImageCover')){
            $image= $request->file('bookImageCover');
            $extension= $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->move('images/', $filename);
        }

       if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
       }else{
            $books= new Books();
            $books->bookJudul        = $request->bookJudul;
            $books->bookPenulis      = $request->bookPenulis;
            $books->bookPenerbit     = $request->bookPenerbit;
            $books->bookDeskripsi    = $request->bookDeskripsi;
            $books->bookImageCover   = $filename;
            $books->kategori_id      = $request->kategori_id;
            $books->bookStok         = $request->bookStok;
            $books->bookActivate     = $request->bookActivate;


            $books->save();
            Session::flash('alert-class', 'alert-success');
            Session::flash('message','Record inserted successfully.');
         }
         return redirect('/books');
    }

    public function viewEditBooks($id){
        $kategori = Kategori::all();
        $books = Books::find($id);
        $data = ['dataKategori'=> $kategori, 'rowBooks' => $books];
        return view('admin.books.books_edit', $data);
    }

    public function editBooks(Request $request, $id){

    //     $validator = Validator::make($request->all(), [
    //         'projectName' => 'required',
    //         'projectDeskripsi' => 'required',
    //         'projectStatus' => 'required',
    //         'projectStart' => 'required',
    //         'projectEnd' => 'required',
    //         'projectImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'kategori_id' => 'required',
    //    ]);


        $newName = '';
        if($request->hasFile('bookImageCover')){
            $image= $request->file('bookImageCover');
            $extension= $image->getClientOriginalExtension();
            $newName = time().'.'.$extension;
            $image->move('images/', $newName);
        }else{
            $newName = $request->bookImageCoverCurent;
        }

        $books= Books::find($id);
            $books->bookJudul        = $request->bookJudul;
            $books->bookPenulis      = $request->bookPenulis;
            $books->bookPenerbit     = $request->bookPenerbit;
            $books->bookDeskripsi    = $request->bookDeskripsi;
            $books->bookImageCover   = $newName;
            $books->kategori_id      = $request->kategori_id;
            $books->bookStok         = $request->bookStok;
            $books->bookActivate     = $request->bookActivate;




        $books->update();
        Session::flash('alert-class', 'alert-success');
        Session::flash('message','Record inserted successfully.');
        return redirect('/books');
    }

    public function deleteBooks($id){
        $project = Books::find($id);
        $project->delete();
        return redirect('/books');
    }
}
