<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function latest_order()
    {
        $prefix = 'OR'.date('Ymd');
        return DB::table('orders')
            ->select('no')
            ->where('no', 'like', $prefix.'%')
            ->orderBy('created_at','DESC')
            ->first();
    }

    public function detail_order($id)
    {
        return DB::table('orders')->where('orders.id',$id)
            ->leftJoin('users', 'orders.id_user', '=', 'users.id')
            ->leftJoin('catalogs', 'orders.id_catalog', '=', 'catalogs.id')
            ->select('orders.*','users.name as name_user','users.phone','catalogs.name as name_catalog','catalogs.price','catalogs.code')
            ->first();
    }

    public function addData($data)
    {
        DB::table('orders')
            ->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('orders')
            ->where('id', $id)
            ->delete();
    }

    public function getOrderByIdUser($idUser)
    {
        return DB::table('orders')
            ->select('*')
            ->where('id_user', $idUser)
            ->get();
    }
}
