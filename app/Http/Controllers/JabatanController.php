<?php

namespace App\Http\Controllers;

use App\Menus\Menu;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanRequest;

class JabatanController extends Controller
{
    public function __construct() {
        $this->menus = new Menu;
    }

    public function main() {
        return view('content.jabatan.jabatan', [
            'menus' => $this->menus->menu()
        ]);
    }

    public function adding(JabatanRequest $req) {
        Jabatan::create([
            'jabatan' => $req['nama_jabatan']
        ]);
        return redirect()->route('jabatan');
    }
    
    public function updating(JabatanRequest $req, $id) {
        Jabatan::where('id', $id)->update([
            'jabatan' => $req['nama_jabatan']
        ]);
        return redirect()->route('jabatan');
    }
    
    public function deleting($id) {
        Jabatan::where('id', $id)->delete();
        return redirect()->route('jabatan');
    }
}
