@extends('layouts.admin')

@section('content')
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tabel Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tabel</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Data Peminjaman</h3>
                        <div class="card-tools">

                            <a href="{{ route('transaksi.add') }}"><button type="button"
                                    class="btn btn-danger">Tambah</button></a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="tabel-data" class="table table-striped table-valign-middle">
                            <thead>

                                <tr>
                                    <th>Nama Admin</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Laptop</th>
                                    <th>Detail Peminjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>
                                            {{ $row->nama_admin }}
                                        </td>
                                        <td>{{ $row->nama_peminjam }}</td>
                                        <td>
                                            {{ $row->nama_laptop }}
                                        </td>
                                        <td>
                                            Harga : {{ $row->harga_peminjaman }} <br>
                                            Denda : {{ $row->denda }} <br>
                                            Status Peminjaman : {{ $row->status_peminjaman }} <br>
                                            Status Pembayaran : {{ $row->status_pembayaran }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('transaksi.edit',['id'=>$row->id_transaksi]) }}"><button
                                                    type="button" class="btn btn-secondary">Edit</button></a> --}}
                                            <a href="{{ route('transaksi.delete', ['id' => $row->id_transaksi]) }}"><button
                                                    type="button" class="btn btn-danger">Soft Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
@endsection
