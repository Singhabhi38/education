<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceModel extends Model
{
	use SoftDeletes;

    protected $table = 'attendance';

    protected $fillable = array('user_id', 'in_or_out','comment','year_np','month_name_np','month_np','day_np','created_by');

    public function getTableName(){
        return $this->table;
    }

    /**
     * Get the User associated with the user.
     */
    public function user(){
        return $this->belongsTo('App\UserModel');
    }

}
