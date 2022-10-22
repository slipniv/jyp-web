<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drivers;

class Location extends Model
{
    protected $connection = 'mysql';
    protected $table = 'location';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'longitude',
        'latitude'
    );

    public function driver(){
        return $this->hasOne(Drivers::class,'id','driver_id');
    }

}
