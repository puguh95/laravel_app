<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->User = new User();
    }
    
    public function index()
    {
        $users = User::all();
        $headers = ['Name', 'Username', 'Phone', 'Alamat','Email', 'User Type','Action'];
        $columns = ['name', 'username', 'phone', 'address','email', 'user_type'];
        $data = [
            'users' => $users,
            'headers' => $headers,
            'columns' => $columns
        ];
        return view('layout.admin.user.index', $data);
    }

    public function edit($id)
    {
        $user = $this->User->detail_user($id);
        if(!$user) {
            abort(404);
        }
        $data = [
            'user' => $user,
        ];
        return view('layout.admin.user.edit_user', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'name' => 'required',
            // 'username' => 'required',
            // 'email' => 'required',
        ], [
            'name.required' => 'wajib diisi !',
            // 'username.required' => 'wajib diisi !',
            // 'username.unique' => 'username sudah dipakai !',
            // 'email.required' => 'wajib diisi !',
            // 'email.unique' => 'email sudah dipakai !',
        ]);

        $data = [
            'name' => Request()->name,
            'address' => Request()->address,
            // 'username' => Request()->username,
            // 'email' => Request()->email
        ];

        $this->User->updateData($id, $data);
        return redirect()->route('user')->with('message', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $this->User->deleteData($id);
        return redirect()->route('user')->with('message', 'Data berhasil dihapus');
    }
}