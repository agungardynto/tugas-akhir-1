@extends('layouts.main')
@section('karyawan', 'active')
@section('content')
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('karyawan.store') }}" method="post">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="nama_karyawan">Nama</label>
                                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="{{ old('nama_karyawan') }}" placeholder="Nama Lengkap Karyawan" autocomplete="off">
                                                </div>
                                                @error('nama_karyawan')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="jk">Jenis Kelamin</label>
                                                    <select name="jk" id="jk" class="custom-select">
                                                        <option value="" selected hidden disabled>Pilih Jenis Kelamin</option>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                @error('jk')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="umur_karyawan">Umur</label>
                                                    <input type="text" name="umur_karyawan" id="umur_karyawan" class="form-control" value="{{ old('umur_karyawan') }}" placeholder="Umur Karyawan" autocomplete="off">
                                                </div>
                                                @error('umur_karyawan')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pendidikan_karyawan">Pendidikan</label>
                                                    <select name="pendidikan_karyawan" id="pendidikan_karyawan" class="custom-select">
                                                        <option value="" selected hidden disabled>Pilih Pendidikan</option>
                                                        @foreach ($data['pendidikan'] as $pendidikan)
                                                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->pendidikan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('pendidikan_karyawan')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="nomor_telepon">Nomor Telepon Aktif</label>
                                                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" placeholder="Nomor Telepon Aktif" autocomplete="off">
                                                </div>
                                                @error('nomor_telepon')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="jabatan_karyawan">Jabatan</label>
                                                    <select name="jabatan_karyawan" id="jabatan_karyawan" class="custom-select">
                                                        <option value="" selected hidden disabled>Pilih Jabatan</option>
                                                        @foreach ($data['jabatan'] as $jabatan)
                                                        <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('jabatan_karyawan')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="status_karyawan">Status</label>
                                                    <select name="status_karyawan" id="status_karyawan" class="custom-select">
                                                        <option value="" selected hidden disabled>Pilih Status</option>
                                                        @foreach ($data['status'] as $status)
                                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('status_karyawan')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group pt-2">
                                                    <button type="submit" class="btn btn-success mt-4">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection