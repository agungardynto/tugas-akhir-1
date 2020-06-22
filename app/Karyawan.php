<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
    public function pendidikan() {
        return $this->belongsTo(pendidikan::class, 'pendidikan_id', 'id');
    }
    public function status() {
        return $this->belongsTo(Jabatan::class, 'status_id', 'id');
    }
}
