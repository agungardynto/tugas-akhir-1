@extends('layouts.main')
@section('jabatan', 'active')
@section('ex-css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('ex-js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('scripts/dtx.jabatan.js') }}"></script>
    <script>
        function format ( d ) {return `Jabatan Diadakan : ${new Date(d.created_at).toLocaleDateString()} <form action="jabatan/${d.id}" method="post" class="d-inline-block">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger py-0 ml-4">Hapus</button></form><br><form action="jabatan/${d.id}" method="post" class="d-inline-block mt-1">@csrf @method('patch')<input type="text" name="nama_jabatan" value="${d.jabatan}" class="form-control form-control-sm d-inline-block" placeholder="Nama Jabatan" autocomplete="off"><button type="submit" class="btn btn-sm btn-primary py-0">Perbarui Jabatan</button></form>`;}
    </script>
@endsection
@section('content')
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-jabatan">
                                        Tambah Jabatan
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="jabatan" class="table table-bordered table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama Jabatan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambah-jabatan" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Jabatan</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('jabatan.tambah') }}" method="post">
                                    @csrf

                                    <div class="modal-body">
                                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="Nama Jabatan" autocomplete="off">
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