<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $connection = 'mysql';
    protected $table = 'destination';
    protected $fillable = array (
        'id',
        'area'
    );
}
