@extends('layouts.main')
@section('karyawan', 'active')
@section('ex-css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('ex-js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('scripts/dtx.karyawan.js') }}"></script>
    <script>
        function format(d) {return `Karyawan Sejak : ${new Date(d.created_at).toLocaleDateString()}<br>Aksi : <a href="karyawan/${d.id}/edit" class="btn btn-sm btn-info py-0">Perbarui Karyawan</a> <form action="karyawan/${d.id}" method="post" class="d-inline-block">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger py-0">Hapus Karyawan</button></form>`;}
    </script>
    <script>
        console.log(document.querySelector('td.details-control'))
    </script>
@endsection
@section('content')
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ route('karyawan.create') }}" class="btn btn-success float-right">Tambah Karyawan</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="karyawan" class="table table-bordered table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Umur</th>
                                                    <th>Jabatan</th>
                                                    <th>Pendidikan</th>
                                                    <th>Kontak</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection