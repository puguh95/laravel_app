<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Catalog = new Catalog();
    }
    
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
        return view('layout.admin.catalog.index', $data);
    }

    public function add()
    {
        return view('layout.admin.catalog.add_catalog');
    }

    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'code' => 'required|unique:catalogs,code|min:4',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,bmp,png|max:1024'
        ], [
            'name.required' => 'wajib diisi !',
            'code.required' => 'wajib diisi !',
            'code.min' => 'Min 4 karakter !',
            'code.unique' => 'kode sudah dipakai !',
            'description.required' => 'wajib diisi !',
            'price.required' => 'wajib diisi !',
            'image.required' => 'wajib upload gambar !',
        ]);

        //validate image
        $file = Request()->image;
        $fileName = Request()->code . '.' . $file->extension();
        $file->move(public_path('uploads/catalogs'), $fileName);
        
        $data = [
            'name' => Request()->name,
            'code' => Request()->code,
            'description' => Request()->description,
            'price' => Request()->price,
            'image' => $fileName,
        ];

        $this->Catalog->addData($data);
        return redirect()->route('catalog')->with('message', 'Data berhasil ditambahkan');

    }

    public function edit($id)
    {
        $catalog = $this->Catalog->detail_catalog($id);
        if(!$catalog) {
            abort(404);
        }
        $data = [
            'catalog' => $catalog,
        ];
        return view('layout.admin.catalog.edit_catalog', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'name' => 'required',
            'code' => 'required|min:4',
            'description' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'wajib diisi !',
            'code.required' => 'wajib diisi !',
            'code.min' => 'Min 4 karakter !',
            'code.unique' => 'kode sudah dipakai !',
            'description.required' => 'wajib diisi !',
            'price.required' => 'wajib diisi !',
        ]);

        $data = [
            'name' => Request()->name,
            'code' => Request()->code,
            'description' => Request()->description,
            'price' => Request()->price,
        ];

        if(Request()->image <> ""){
            //validate image
            $file = Request()->image;
            $fileName = Request()->code . '.' . $file->extension();
            $file->move(public_path('uploads/catalogs'), $fileName);
            $data['image'] = $fileName;
        }

        $this->Catalog->updateData($id, $data);
        return redirect()->route('catalog')->with('message', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $catalog = $this->Catalog->detail_catalog($id);
        if($catalog->image <> ""){
            unlink(public_path('uploads/catalogs') . '/' . $catalog->image);
        }
        $this->Catalog->deleteData($id);
        return redirect()->route('catalog')->with('message', 'Data berhasil dihapus');
    }
}
