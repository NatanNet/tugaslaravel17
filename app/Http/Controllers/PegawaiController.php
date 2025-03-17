<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    //yang pertama lalu diubah menjadi
    // public function index($nama) {
    //     return "Nama Pegawai : " .$nama;  //untuk nama pegawai saya tambahkan sendiri
    //}

    //yang kedua
    public function index(Request $request) {
        return $request->segment(2); //jadi jika isi segmen diubah 1 akan menampilkan pegawai, jika 2 akan menampilkan nama setelah pegawai yang saya masukkan
    }

    // menambahkan function formulir dan proses
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request){
        // tambahan
        $messages =[
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        $request->validate([
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|regex:/^[a-zA-Z0-9\s,.]+$/',
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
}
