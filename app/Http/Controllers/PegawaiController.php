<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
}
