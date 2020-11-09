<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseUserModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('course_id', 'user_id');

    protected $table = 'course_user';

    public function getTableName(){
        return $this->table;
    }
}
