<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>editlaptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-10 mt-10">Edit Laptop</h1>
    <div class="content">
      <div class="container">
            <form method="POST" action="{{ route('laptop.update') }}" >
            @csrf
                @isset($data)
                    <input name="id_laptop" type="hidden" value="{{ $data->id_laptop }}">
                @endisset
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> --}}
                <div class="form-group mb-3">
                    <label for="nama_laptop">Nama Laptop</label>
                    <input name="nama_laptop"type="text" class="form-control" id="nama_laptop"
                        @isset($data)
                        value={{ $data->nama_laptop }}
                    @endisset>
                </div>
                <div class="form-group mb-3">
                    <label for="tipe_laptop">Tipe Laptop</label>
                    <input name="tipe_laptop" type="text" class="form-control" id="tipe_laptop"
                        @isset($data)
                        value={{ $data->tipe_laptop }}
                    @endisset>
                </div>
                <div class="form-group mb-3">
                    <label for="merek_laptop">Merek Laptop</label>
                    <input name="merek_laptop" type="text" class="form-control" id="merek_laptop"
                        @isset($data)
                        value={{ $data->merek_laptop }}
                    @endisset>
                </div>
                <div class="form-group mb-3">
                    <label for="harga_laptop">Harga Laptop</label>
                    <input name="harga_laptop" type="number" class="form-control" id="harga_laptop"
                        @isset($data)
                        value={{ $data->harga_laptop }}
                    @endisset>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- /.card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
