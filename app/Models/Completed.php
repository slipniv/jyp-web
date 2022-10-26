<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drivers;
use App\Models\Destination;
use App\Models\Ongoing;

class Completed extends Model
{
    protected $connection = 'mysql';
    protected $table = 'completed';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'arrive',
        'driver_id',
        'destination_id',
        'status_id',
        'remarks'
    );

    public function driver(){
        return $this->hasOne(Drivers::class,'id','driver_id');
    }

    public function destination(){
        return $this->hasOne(Destination::class,'id','destination_id');
    }

    public function ongoing(){
        return $this->hasOne(ongoing::class,'id','arrive_id');
    }
    

}
