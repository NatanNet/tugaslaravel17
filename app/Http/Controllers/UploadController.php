<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
//use Illuminate\Http\Request;
//use Intervention\Image\Image;
//use Illuminate\Support\Facades\File; 
//use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManager;
//use Intervention\Image\ImageManagerStatic as Image;


class UploadController extends Controller
 {
     public function upload()
     {
         return view("upload");
     }
 
     public function prosesUpload(Request $request)
     {
         $request->validate([
             "file"=> "required",
             "keterangan"=> "required",
         ]);
 
         $file = $request->file("file");
 
         echo 'File Name: ' . $file->getClientOriginalName(). '<br>';
         echo 'File Exension: ' . $file->getClientOriginalExtension() . '<br>';
         echo 'File Real path: ' . $file->getRealPath() . '<br>';
         echo 'File Size: ' . $file->getSize() . '<br>';
         echo 'File Mime Type: ' . $file->getMimeType() . '<br>';
 
         $tujuanUpload = 'data_file';
         $file->move($tujuanUpload, $file->getClientOriginalName());
     }
 
     public function resizeImage(Request $request)
     {
         $request->validate([
             "file" => "required",
             "keterangan" => "required",
         ]);
 
         $path = public_path("img/logo");
 
         if (!File::isDirectory($path)) {
             File::makeDirectory($path,0777, true);
         }
 
         $file = $request->file("file");
         $fileName = 'logo'. uniqid() . '.' . $file->getClientOriginalExtension();
 
         $file->move($path, $fileName);
 
         $manager = new ImageManager(new Driver());
         $image = $manager->read($path . '/' . $fileName);
 
         $canvas = $image->resizeCanvas(200, 200, 'fff');
 
         $resizeImage = $image->scale(200);
 
         $canvas->place($resizeImage, 'center');
 
         if ($canvas->save($path . '/' . $fileName)) {
             return redirect()->route('upload')->with('success','Data berhasil ditambahkan');
         } else {
             return redirect()->route('upload')->with('error', 'Data gagal ditambahkan');
         }
     }
     public function dropzone()
     {
        return view('dropzone');
     }

     public function dropzone_store(Request $request)
     {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
     }
     public function pdf_upload()
     {
        return view('pdf_upload');
     }

     public function pdf_store(Request $request)
     {
        $pdf = $request->file('file');

        $pdfName = 'pdf_'.time().'.'.$pdf->extension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' => $pdfName]);
     }
 }
