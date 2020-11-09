<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('name','short_name', 'display_name',
                                'roll_number','year','semester',
                                'trimester','month',
                                'section');

    protected $table = 'grades';

    public function getTableName(){
        return $this->table;
    }

    public function users(){
        return $this->belongsToMany('App\UserModel','grade_user','grade_id','user_id');
    }
    public function courses(){
        return $this->hasMany('App\CourseModel','grade_id');
    }
}
