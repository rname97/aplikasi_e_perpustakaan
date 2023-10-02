<?php

namespace App\Http\Controllers\Admin;

use App\Models\Books;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $books = Books::all();
        $data = ['dataBooks'=> $books, 'dataKategori' => $kategori];
        return view('admin.dashboard.dashboard', $data);
    }
}
