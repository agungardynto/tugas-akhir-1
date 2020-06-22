<?php

namespace App\Http\Controllers;

use App\Menus\Menu;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    public function __construct() {
        $this->menus = new Menu;
    }

    public function main() {
        return view('content.status.status', [
            'menus' => $this->menus->menu()
        ]);
    }

    public function adding(StatusRequest $req) {
        Status::create([
            'status' => $req['nama_status']
        ]);
        return redirect()->route('status');
    }

    public function updating(StatusRequest $req, $id) {
        Status::where('id', $id)->update([
            'status' => $req['nama_status']
        ]);
        return redirect()->route('status');
    }
    
    public function deleting($id) {
        Status::where('id', $id)->delete();
        return redirect()->route('status');
    }
}
