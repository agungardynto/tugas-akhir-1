<?php

namespace App\Http\Controllers;

use App\Menus\Menu;
use App\Karyawan;
use App\Jabatan;
use App\Pendidikan;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Requests\KaryawanRequest;

class KaryawanController extends Controller
{
    public function __construct() {
        $this->menus = new Menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.karyawan.karyawan', [
            'menus' => $this->menus->menu()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.karyawan.tambah', [
            'menus' => $this->menus->menu(),
            'data' => [
                'jabatan' => Jabatan::all(),
                'pendidikan' => Pendidikan::all(),
                'status' => Status::all()
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanRequest $request)
    {
        Karyawan::create([
            'nama' => $request['nama_karyawan'],
            'jenis_kelamin' => $request['jk'],
            'umur' => $request['umur_karyawan'],
            'jabatan_id' => $request['jabatan_karyawan'],
            'pendidikan_id' => $request['pendidikan_karyawan'],
            'nomor_hp' => $request['nomor_telepon'],
            'status_id' => $request['status_karyawan']
        ]);
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('content.karyawan.perbarui', [
            'karyawan' => $karyawan,
            'menus' => $this->menus->menu(),
            'data' => [
                'jabatan' => Jabatan::all(),
                'pendidikan' => Pendidikan::all(),
                'status' => Status::all()
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update([
            'nama' => $request['nama_karyawan'],
            'jenis_kelamin' => $request['jk'],
            'umur' => $request['umur_karyawan'],
            'jabatan_id' => $request['jabatan_karyawan'],
            'pendidikan_id' => $request['pendidikan_karyawan'],
            'nomor_hp' => $request['nomor_telepon'],
            'status_id' => $request['status_karyawan']
        ]);
        return redirect()->route('karyawan.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
