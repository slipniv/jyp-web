<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drivers;
use App\Models\Destination;

class Ongoing extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ongoing';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'arrivalDate',
        'startingDate',
        'driver_id',
        'destination_id',
        'status_id'
    );

    public function driver(){
        return $this->hasOne(Drivers::class,'id','driver_id');
    }

    public function destination(){
        return $this->hasOne(Destination::class,'id','destination_id');
    }

}
