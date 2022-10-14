<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $connection = 'mysql';
    protected $table = 'schedule';
    protected $fillable = array (
        'id',
        'date',
        'time'
    );
}
