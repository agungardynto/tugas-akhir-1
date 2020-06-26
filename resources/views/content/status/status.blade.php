@extends('layouts.main')
@section('status', 'active')
@section('ex-css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('ex-js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('scripts/dtx.status.js') }}"></script>
    <script>
        function format ( d ) {return `Status Diadakan : ${new Date(d.created_at).toLocaleDateString()} <form action="status/${d.id}" method="post" class="d-inline-block">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger py-0 ml-4">Hapus</button></form><br><form action="status/${d.id}" method="post" class="d-inline-block mt-1">@csrf @method('patch')<input type="text" name="nama_status" value="${d.status}" class="form-control form-control-sm d-inline-block" placeholder="Nama Jabatan" autocomplete="off"><button type="submit" class="btn btn-sm btn-primary py-0">Perbarui Status</button></form>`;}
    </script>
@endsection
@section('content')
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-status">
                                        Tambah Status Karyawan
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="status" class="table table-bordered table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambah-status" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Status</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('status.tambah') }}" method="post">
                                    @csrf

                                    <div class="modal-body">
                                        <select name="nama_status" class="custom-select">
                                            <option value="Karyawan Tetap">Karyawan Tetap</option>
                                            <option value="Magang">Magang</option>
                                            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                            <option value="Pekerja Paruh Waktu">Pekerja Paruh Waktu</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection