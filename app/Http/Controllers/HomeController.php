<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Catalog = new Catalog();
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $catalogs = $this->Catalog::all();
        $headers = ['Nama', 'Kode', 'Deskripsi', 'Harga', 'Gambar','Action'];
        $columns = ['name', 'code', 'description', 'price'];
        $data = [
            'catalogs' => $catalogs,
            'headers' => $headers,
            'columns' => $columns
        ];


        if(auth()->user()){
            if(auth()->user()->user_type === 'ADMIN'){
                return view('layout.admin.v_home');
            } else {
                return view('index',$data);
            }
        } else {
            return view('index',$data);
        }
    }
}
