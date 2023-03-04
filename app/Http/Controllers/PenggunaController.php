<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{

    public function index(Request $request)
    {
        $data = User::get();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $req = $request->all();

        if($req['password'] != $req['password_confirmation']){
            return redirect('user/create')->with('status', 'Password Tidak Sama !');
        }

        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];

        $validator = Validator::make($req, $rules);
        if ( $validator->fails() ) {
            return redirect('user/create')->with('status', 'Email sudah terdaftar');
        } 

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if($user){
            return redirect('user')->with('status', 'Berhasil mendaftar !');
        }
        return redirect('user/create')->with('status', 'Gagal Register Account !');
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('user.show', compact('data'));
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    public function edit_pass($id)
    {
        $data = User::find($id);
        return view('user.edit-pass', compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        $req = $request->all();

        $user = User::find($id)->update($req);
        if($user){
            return redirect('user')->with('status', 'Berhasil tambah data !');
        }
        return redirect('user/edit/' .$id)->with('status', 'Gagal edit Account !');
        
    }

    public function update_pass(Request $request, $id)
    {
        $req = $request->all();

        if($req['password'] != $req['password_confirmation']){
            return redirect('user/edit-pass/'.$id)->with('status', 'Password Tidak Sama !');
        }

        $user = User::find($id)->update([
            'password' => Hash::make($request['password']),
        ]);
        if($user){
            return redirect('user')->with('status', 'Berhasil tambah data !');
        }
        return redirect('user/edit/' .$id)->with('status', 'Gagal edit Account !');
        
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect('user')->with('status', 'Data tidak ditemukan !');
        }
        
        $delete = $data->delete();
        if ($delete) {
            return redirect('user')->with('status', 'Berhasil hapus Data Pengguna !');
        }
        return redirect('user')->with('status', 'Gagal hapus Data Pengguna !');
    }
}
