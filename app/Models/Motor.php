<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['mesin', 'tipe_suspensi', 'tipe_transmisi'];

    // ...
}
