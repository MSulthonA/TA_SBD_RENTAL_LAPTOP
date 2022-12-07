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
                        <h1 class="m-0">Tabel Peminjaman</h1>
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

                            <a href="{{ route('peminjaman.add') }}"><button type="button"
                                    class="btn btn-danger">Tambah</button></a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="tabel-data" class="table table-striped table-valign-middle">
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
                                @foreach ($data as $row)
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
                                            {{ $row->tanggal_pengembalian }}
                                        </td>
                                        <td>
                                            <a href="{{ route('peminjaman.edit', ['id' => $row->id_peminjaman]) }}"><button
                                                    type="button" class="btn btn-secondary">Edit</button></a>
                                            <a href="{{ route('peminjaman.delete', ['id' => $row->id_peminjaman]) }}"><button
                                                    type="button" class="btn btn-danger">Delete</button></a>
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
