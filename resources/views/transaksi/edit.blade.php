<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tambahpeminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-10 mt-10">Edit Peminjaman</h1>
    <div class="content">
      <div class="container">
            <form method="POST" action="{{ route('transaksi.store') }}" >
            @csrf
                @isset($data)
                    <input name="id_transaksi" type="hidden" value="{{ $data->id_transaksi }}">
                @endisset
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> --}}
                <div class="form-group">
                    <label for="id_admin">Pilih Admin</label>
                    <select name="id_admin" id="id_admin" class="form-select">
                    @foreach ($admins as $admin)
                    <option value="{{ $admin->id_admin }}"
                    @if ($data->id_admin==$admin->id_admin)
                      selected
                    @endif>{{ $admin->nama_admin }}</option>
                    @endforeach
                    </select>
                    <label for="id_peminjam">Pilih Peminjam</label>
                    <select name="id_peminjam" id="id_peminjam" class="form-select">
                    @foreach ($peminjams as $peminjam)
                    <option value="{{ $peminjam->id_peminjam }}"
                    @if ($data->id_peminjam==$peminjam->id_peminjam)
                      selected
                    @endif>{{ $peminjam->nama_peminjam }}</option>
                    @endforeach
                    </select>
                    <label for="id_peminjaman">Pilih Peminjaman</label>
                    <select name="id_peminjaman" id="id_peminjaman" class="form-select">
                    @foreach ($peminjamans as $peminjaman)
                    <option value="{{ $peminjaman->id_peminjaman }}"
                    @if ($data->id_peminjaman==$peminjaman->id_peminjaman)
                      selected
                    @endif>{{ "id :".$peminjaman->id_peminjaman."\nharga :".$peminjaman->harga_peminjaman."\ndenda :".$peminjaman->denda }}</option>
                    @endforeach
                    </select>
                    <label for="id_laptop">Pilih Laptop</label>
                    <select name="id_laptop" id="id_laptop" class="form-select">
                    @foreach ($laptops as $laptop)
                    <option value="{{ $laptop->id_laptop }}"
                      @if ($data->id_laptop==$laptop->id_laptop)
                      selected
                    @endif>{{ $laptop->nama_laptop }}</option>
                    @endforeach
                    </select>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- /.card -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
