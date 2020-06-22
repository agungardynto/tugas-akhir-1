<?php

namespace App\Http\Controllers;

use App\Menus\Menu;
use App\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Requests\PendidikanRequest;

class PendidikanController extends Controller
{
    public function __construct() {
        $this->menus = new Menu;
    }

    public function main() {
        return view('content.pendidikan.pendidikan', [
            'menus' => $this->menus->menu()
        ]);
    }

    public function adding(PendidikanRequest $req) {
        Pendidikan::create([
            'pendidikan' => $req['nama_pendidikan']
        ]);
        return redirect()->route('pendidikan');
    }

    public function updating(PendidikanRequest $req, $id) {
        Pendidikan::where('id', $id)->update([
            'pendidikan' => $req['nama_pendidikan']
        ]);
        return redirect()->route('pendidikan');
    }
    
    public function deleting($id) {
        Pendidikan::where('id', $id)->delete();
        return redirect()->route('pendidikan');
    }
}
