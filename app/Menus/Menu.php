<?php

namespace App\Menus;

class Menu {
    public function menu() {
        return [
            [
                'icon' => 'fas fa-tachometer-alt',
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'is_active' => 'dashboard'
            ],
            [
                'icon' => 'fas fa-table',
                'name' => 'Data Karyawan',
                'route' => 'karyawan.index',
                'is_active' => 'karyawan'
            ],
            [
                'icon' => 'fas fa-user-tag',
                'name' => 'Jabatan',
                'route' => 'jabatan',
                'is_active' => 'jabatan'
            ],
            [
                'icon' => 'fas fa-user-graduate',
                'name' => 'Pendidikan',
                'route' => 'pendidikan',
                'is_active' => 'pendidikan'
            ],
            [
                'icon' => 'fas fa-ribbon',
                'name' => 'Status',
                'route' => 'status',
                'is_active' => 'status'
            ]
        ];
    }
}