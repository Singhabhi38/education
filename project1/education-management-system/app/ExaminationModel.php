<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('name', 'grade_id', 'course_id', 'room_id');

    protected $table = 'examinations';

    public function getTableName(){
        return $this->table;
    }

    public function grade() {
        return $this->hasOne('App\GradeModel', 'id', 'grade_id');//does it maps examination.grade_id to grade.id??
    }

    public function course() {
        return $this->hasOne('App\CourseModel', 'id', 'course_id');
    }

    public function room() {
        return $this->hasOne('App\RoomModel', 'id', 'room_id');
    }
}