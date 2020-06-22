<?php

namespace App\Http\Controllers;

use App\Menus\Menu;
use App\Karyawan;
use App\Jabatan;
use App\Pendidikan;
use App\Status;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct() {
        $this->menus = new Menu;
    }

    public function dashboard() {
        return view('content.dashboard', [
            'menus' => $this->menus->menu(),
            'count' => [
                [
                    'title' => 'Total Karyawan',
                    'count' => Karyawan::all()->count(),
                    'icon' => 'fas fa-cog',
                    'background' => 'bg-danger'
                ],
                [
                    'title' => 'Total Jabatan',
                    'count' => Jabatan::all()->count(),
                    'icon' => 'fas fa-thumbs-up',
                    'background' => 'bg-warning'
                ],
                [
                    'title' => 'Total Pendidikan',
                    'count' => Pendidikan::all()->count(),
                    'icon' => 'fas fa-shopping-cart',
                    'background' => 'bg-success'
                ],
                [
                    'title' => 'Total Status',
                    'count' => Status::all()->count(),
                    'icon' => 'fas fa-users',
                    'background' => 'bg-primary'
                ]
            ]
        ]);
    }

    // public function test() {
    //     $karyawan = Karyawan::all();
    //     $test = [
    //         'draw' => 1,
    //         'recordsTotal' => $karyawan->count(),
    //         'recordsFiltered' => $karyawan->count(),
    //         'data' => $karyawan,
    //         'input' => []
    //     ];
    //     return $test;
    // }
}
