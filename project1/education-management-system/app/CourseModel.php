<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('name','room_id','grade_id','theory_marks','practical_marks','theory','practical');

    protected $table = 'courses';

    public function getTableName(){
        return $this->table;
    }

    public function grade(){
        return $this->hasOne('App\GradeModel','id');
    }

    public function users(){
		return $this->belongsToMany('App\UserModel','course_user','course_id','user_id');
	}
}