@extends('layouts.admin')

@section('content')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tabel Laptop</h1>
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
            <div class="container ">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Data Laptop</h3>
                        <div class="card-tools">

                            <a href="{{ route('laptop.add') }}"><button type="button"
                                    class="btn btn-danger">Tambah</button></a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="tabel-data" class="table table-striped table-valign-middle">
                            <thead>

                                <tr>
                                    <th>Id Laptop</th>
                                    <th>Nama Laptop</th>
                                    <th>Tipe Laptop</th>
                                    <th>Merek Laptop</th>
                                    <th>Harga Laptop</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>
                                            {{ $row->id_laptop }}
                                        </td>
                                        <td>
                                            {{ $row->nama_laptop }}
                                        </td>
                                        <td>{{ $row->tipe_laptop }}</td>
                                        <td>
                                            {{ $row->merek_laptop }}
                                        </td>
                                        <td>
                                            {{ $row->harga_laptop }}
                                        </td>
                                        <td>
                                            <a href="{{ route('laptop.edit', ['id' => $row->id_laptop]) }}"><button
                                                    type="button" class="btn btn-secondary">Edit</button></a>
                                            <a href="{{ route('laptop.delete', ['id' => $row->id_laptop]) }}"><button
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
