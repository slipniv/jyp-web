<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

class Message extends Model
{
    protected $connection = 'mysql';
    protected $table = 'message';
    protected $primaryKey = 'id';
    protected $fillable = array (
        'id',
        'schedule_id',
        'status'
    );

    public function schedule(){
        return $this->hasOne(Schedule::class,'id','schedule_id');
    }
}
