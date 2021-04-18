<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    public function detail_catalog($id)
    {
        return DB::table('catalogs')->where('id',$id)->first();
    }

    public function addData($data)
    {
        DB::table('catalogs')
            ->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('catalogs')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('catalogs')
            ->where('id', $id)
            ->delete();
    }
}
