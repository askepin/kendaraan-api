<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['mesin', 'kapasitas_penumpang', 'tipe'];

    // ...
}
