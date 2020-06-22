<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function karyawan() {
        return $this->hasMany(Karyawan::class, 'status_id', 'id');
    }
}
