<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tambahpeminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-10 mt-10">Tambah Peminjaman</h1>
    <div class="content">
      <div class="container">
            <form method="POST" action="{{ route('peminjaman.store') }}" >
            @csrf
                @isset($data)
                    <input name="id_peminjaman" type="hidden" value="{{ $data->id_peminjaman }}">
                @endisset
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> --}}
                <div class="form-group">
                    <label for="harga">Harga Peminjaman</label>
                    <input name="harga_peminjaman"type="number" class="form-control" id="harga" 
                    @isset($data)
                        value={{ $data->harga_peminjaman }}
                    @endisset
                    >
                  </div>
                  <div class="form-group">
                    <label for="Denda">Denda</label>
                    <input name="denda" type="number" class="form-control" id="Denda" 
                    @isset($data)
                        value={{ $data->denda }}
                    @endisset
                    >
                  </div>
                    <label for="status_peminjaman">Status Peminjaman</label>
                    <select name="status_peminjaman" id="status_peminjaman" class="form-select">
                    <option value="">Pilih Status</option>
                    <option value="sedang masa peminjaman"  
                    @isset($data)
                    @if ($data->status_peminjaman=="sedang masa peminjaman")
                        selected    
                    @endif
                    @endisset
                    >sedang masa peminjaman</option>
                    <option value="selesai masa peminjaman"
                    @isset($data)
                    @if ($data->status_peminjaman=="selesai masa peminjaman")
                        selected
                    @endif                   
                    @endisset
                    >selesai masa peminjaman</option> 
                    </select>
                    <label for="status_pembayaran">Status Pembayaran</label>
                    <select name="status_pembayaran" id="status_pemabayaran" class="form-select">
                    <option value="">Pilih Status</option>
                    <option value="belum dibayar"  
                    @isset($data)
                    @if ($data->status_pembayaran=="belum dibayar")
                        selected    
                    @endif
                    @endisset
                    >belum dibayar</option>
                    <option value="sudah dibayar"
                    @isset($data)
                    @if ($data->status_pembayaran=="sudah dibayar")
                        selected
                    @endif                   
                    @endisset
                    >sudah dibayar</option> 
                    </select>
                    <div class="form-group">
                        <label for="lama_peminjaman">Lama Peminjaman</label>
                        <input type="number" name="lama_peminjaman" class="form-control" id="lama_peminjaman" 
                        @isset($data)
                            value={{ $data->lama_peminjaman }}
                        @endisset
                        >
                    </div>
                    <div class="form-group">
                        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" 
                        @isset($data)
                            value={{ $data->tanggal_peminjaman }}
                        @endisset
                        >
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian" 
                        @isset($data)
                            value={{ $data->tanggal_pengembalian }}
                        @endisset
                        >
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- /.card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
