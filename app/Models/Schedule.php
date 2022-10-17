<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drivers;
use App\Models\Destination;

class Schedule extends Model
{
    protected $connection = 'mysql';
    protected $table = 'schedule';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'date',
        'time',
        'driver_id',
        'destination_id'
    );

    public function driver(){
        return $this->hasOne(Drivers::class,'id','driver_id');
    }

    public function destination(){
        return $this->hasOne(Destination::class,'id','destination_id');
    }

}
