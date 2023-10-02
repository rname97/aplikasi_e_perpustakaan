<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $books = Books::all();
        $data = ['dataBooks'=> $books, 'dataKategori' => $kategori];
        return view('admin.dashboard.dashboard', $data);
    }
}
