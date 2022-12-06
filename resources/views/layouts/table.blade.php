

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tabel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-10 mt-10">Tabel Peminjaman</h1>
    <div class="content">
      <div class="container">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Data Peminjaman</h3>
                <div class="card-tools">
                  
                  <a href="{{ route('peminjaman.add') }}"><button type="button" class="btn btn-danger">Tambah</button></a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    
                  <tr>
                    <th>Id Transaksi</th>
                    <th>Harga Peminjaman</th>
                    <th>Denda</th>
                    <th>Status Peminjaman</th>
                    <th>Lama Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                    <td>
                      {{ $row->id_peminjaman }}
                    </td>
                    <td>
                      {{ $row->harga_peminjaman }}
                    </td>
                    <td>{{ $row->denda }}</td>
                    <td>
                      {{ $row->status_peminjaman }}
                    </td>
                    <td>
                      {{ $row->lama_peminjaman }}
                    </td>
                    <td>
                      {{ $row->tanggal_peminjaman }}
                    </td>
                    
                    <td>
                      {{ $row->tanggal_pengembalian}}
                    </td>
                    <td>
                        <a href="{{ route('peminjaman.edit',['id'=>$row->id_peminjaman]) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                        <a href="{{ route('peminjaman.delete',['id'=>$row->id_peminjaman]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
