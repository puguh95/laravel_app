<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Catalog;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Order = new Order();
        $this->Catalog = new Catalog();
    }

    public function status_enum()
    {
        return [
            'Menunggu Pembayaran',
            'Pengecekan Bukti Bayar',
            'Pembayaran Terverifikasi',
            'Sedang Berjalan',
            'Dibatalkan',
            'Sukses'
        ];
    }
    
    public function index()
    {
        $orders = $this->Order::all();
        $headers = ['No Order', 'Total Harga', 'Tanggal Mulai Pinjam', 'Tanggal Akhir Pinjam', 'Alamat Pengiriman', 'Status', 'Action'];
        $columns = ['no', 'total_price', 'start_date', 'end_date', 'delivery_address', 'status'];
        $data = [
            'orders' => $orders,
            'headers' => $headers,
            'columns' => $columns
        ];
        return view('layout.admin.order.index', $data);
    }

    public function add()
    {
        return view('layout.admin.order.add_order');
    }

    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'delivery_address' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'wajib diisi !',
            'start_date.required' => 'wajib diisi !',
            'end_date.required' => 'wajib diisi !',
            'delivery_address.required' => 'wajib diisi !',
            'description.required' => 'wajib diisi !',
        ]);
        
        $data = [
            'name' => Request()->name,
            'start_date' => Request()->start_date,
            'end_date' => Request()->end_date,
            'delivery_address' => Request()->delivery_address,
            'description' => Request()->description,
        ];

        $this->Order->addData($data);
        return redirect()->route('order')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        if(!$order) {
            abort(404);
        }
        $data = [
            'order' => $order,
        ];
        return view('layout.admin.order.edit_order', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'status' => 'required',
        ], [
            'status.required' => 'wajib diisi !',
        ]);

        $data = [
            'status' => Request()->status,
        ];

        if(Request()->image <> ""){
            //validate image
            $file = Request()->image;
            $fileName = 'PAYMENT-'. Request()->no . '.' . $file->extension();
            $file->move('uploads/orders', $fileName);
            $data['payment_image'] = $fileName;
        }

        $this->Order->updateData($id, $data);
        return redirect()->route('order')->with('message', 'Data berhasil diupdate');
    }

    public function create_order()
    {
        Request()->validate([
            'id_catalog' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'delivery_address' => 'required',
        ], [
            'name.required' => 'wajib diisi !',
            'start_date.required' => 'wajib diisi !',
            'end_date.required' => 'wajib diisi !',
            'delivery_address.required' => 'wajib diisi !',
        ]);

        $orderDate = date('Y-m-d');

        $latestOrder = $this->Order->latest_order();
        $catalog = $this->Catalog->detail_catalog(Request()->id_catalog);
        
        $datediff = strtotime(Request()->end_date) - strtotime(Request()->start_date);
        $day = round($datediff / (60 * 60 * 24));
        $total_price = $day * $catalog->price;

        $no = '';
        if($latestOrder != null){
            $last_number = str_pad(((int)substr($latestOrder->no,strlen($latestOrder->no)-4,4))+1,4,"0", STR_PAD_LEFT);
            print_r($last_number);
            $no = 'OR'.date('Ymd').$last_number;
        } else {
            $no = 'OR'.date('Ymd').'0001';
        }
        
        $data = [
            'no' => $no,
            'id_user' => auth()->user()->id,
            'id_catalog' => Request()->id_catalog,
            'order_date' => $orderDate,
            'start_date' => Request()->start_date,
            'end_date' => Request()->end_date,
            'delivery_address' => Request()->delivery_address,
            'total_price' => $total_price,
            'created_by' => auth()->user()->id
        ];

        $this->Order->addData($data);
        return redirect()->route('list-order')->with('message', 'Data berhasil ditambahkan');
    }

    public function list_order()
    {
        $idUser = auth()->user()->id;
        $orders = $this->Order->getOrderByIdUser($idUser);
        $data = [
            'orders' => $orders,
        ];
        return view('layout.order.list-order', $data);
    }

    public function detail_order($id)
    {
        $order = $this->Order->detail_order($id);
        $headers = ['No', 'Jenis Barang', 'Kode Barang', 'Tanggal Pemesanan', 'Tanggal Mulai Pinjam', 'Tanggal Akhir Pinjam', 'Harga'];
        $columns = ['no', 'name_catalog', 'code', 'order_date', 'start_date', 'end_date'];
        $data = [
            'order' => $order,
            'headers' => $headers,
            'columns' => $columns
        ];

        if(auth()->user()){
            if(auth()->user()->user_type === 'ADMIN'){
                return view('layout.admin.order.detail-order', $data);
            } else {
                return view('layout.order.detail-order', $data);
            }
        } else {
            return view('index',$data);
        }
    }

    public function upload_payment($id){
        Request()->validate([
            'image' => 'required',
        ], [
            'image.required' => 'wajib diisi !',
        ]);

        $order = $this->Order->detail_order($id);

        if(Request()->image <> ""){
            //validate image
            $file = Request()->image;
            $fileName = 'PAYMENT-'. $order->no . '.' . $file->extension();
            $file->move('uploads/orders', $fileName);
            $data['payment_upload'] = $fileName;
            $data['status'] = 'Pengecekan Bukti Bayar';
        }

        $this->Order->updateData($id, $data);
        return redirect()->route('list-order')->with('message', 'Data berhasil diupdate');
    }

    public function update_status($id){
        Request()->validate([
            'status' => 'required',
        ], [
            'status.required' => 'wajib diisi !',
        ]);

        $data['status'] = Request()->status;

        $order = $this->Order->detail_order($id);

        $this->Order->updateData($id, $data);
        return redirect()->route('order')->with('message', 'Data berhasil diupdate');
    }
}
