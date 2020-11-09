<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('name', 'building', 'room', 'floor');

    protected $table = 'rooms';

    public function getTableName(){
        return $this->table;
    }
    
    public function courses(){
		return $this->hasOne('App\CourseModel','room_id');
	}
}
