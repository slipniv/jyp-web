<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drivers extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'driver';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'name',
        'platenumber',
        'contact',
        'color'
    );

}
