<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use App\Pendidikan;
use App\Status;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DtController extends Controller
{
    public function karyawan() {
        $karyawan = DB::table('karyawans')
            ->join('jabatans', 'karyawans.jabatan_id', '=', 'jabatans.id')
            ->join('pendidikans', 'karyawans.pendidikan_id', '=', 'pendidikans.id')
            ->join('statuses', 'karyawans.status_id', '=', 'statuses.id')
            ->select('karyawans.id', 'karyawans.nama', 'karyawans.umur', 'karyawans.nomor_hp', 'jabatans.jabatan', 'pendidikans.pendidikan', 'statuses.status', DB::raw('if(jenis_kelamin = "L", "Laki - Laki", "Perempuan") as jk'), 'karyawans.created_at')
            ->whereNull('karyawans.deleted_at')
            ->get();
        return DataTables::of($karyawan)->make(true);
    }

    public function jabatan() {
        return DataTables::of(Jabatan::all())->make(true);
    }
    
    public function pendidikan() {
        return DataTables::of(Pendidikan::all())->make(true);
    }
    
    public function status() {
        return DataTables::of(Status::all())->make(true);
    }
}
