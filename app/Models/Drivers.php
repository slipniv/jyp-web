<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $connection = 'mysql';
    protected $table = 'driver';
    protected $fillable = array (
        'id',
        'name',
        'platenumber',
        'contact'
    );

}
