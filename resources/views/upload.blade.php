<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <title>Upload File dengan Laravel</title>
 </head>
 
 <body>
     <div class="row">
         <div class="container">
             <h2 class="text-center my-5">Upload file dengan laravel</h2>
             <div class="col-lg-8 mx-auto my-5">
                 @if (count($errors) > 0)
                     <div class="alert alert-danger">
                         @foreach ($errors->all() as $error)
                             {{$error}}
                             <br>
                         @endforeach
                     </div>
                 @endif
                 <form enctype="multipart/form-data" action="{{route('upload.resize')}}" method="post">
                     {{csrf_field()}}
                     <div>
                         @if (session('success'))
                             <div class="alert alert-success alert-dismissible">
                                 <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{session('success')}}
                             </div>
                         @endif
 
                         @if (session('error'))
                             <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{session('error')}}
                             </div>
                         @endif
 
                     </div>
                     <div class="form-group">
                         <b>File gambar</b>
                         <input type="file" name="file">
                     </div>
 
                     <div class="form-group">
                         <b>Keterangan</b>
                         <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Upload</button>
                 </form>
             </div>
         </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
         crossorigin="anonymous"></script>
 </body>
 
 </html>