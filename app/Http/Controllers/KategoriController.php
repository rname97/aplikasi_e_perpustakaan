<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{

    public function show(){
        $kategori = Kategori::all();
        // echo json_encode($kategori);
        return view('admin.kategori.kategori_data', ['kategori' => $kategori]);
    }

    public function viewAddKategori(){
        return view('admin.kategori.kategori_add');
    }

    public function addKategori(Request $request){
        $validator = Validator::make($request->all(), [
            'kategoriName' => 'required',
            'kategoriDeskripsi' => 'required',
       ]);

       if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
       }else{
            $kategori= new Kategori();
            $kategori->kategoriName=$request->kategoriName;
            $kategori->kategoriDeskripsi=$request->kategoriDeskripsi;
            $kategori->save();
            Session::flash('alert-class', 'alert-success');
            Session::flash('message','Record inserted successfully.');
         }
         return redirect('/kategori');
    }

    public function viewEditKategori($id){
        $rowKategori = Kategori::find($id);
        // echo json_encode($rowKategori);
        // die();
        return view('admin.kategori.kategori_edit', ['rowKategori' => $rowKategori]);
    }



    public function editKategori(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->kategoriName    = $request->kategoriName;
        $kategori->kategoriDeskripsi    = $request->kategoriDeskripsi;
        $kategori->update();

        return redirect('/kategori');
    }

    public function deleteKategori($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}
