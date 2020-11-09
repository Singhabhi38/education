<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeUserModel extends Model
{
    protected $fillable = array('grade_id','user_id');
	protected $table = 'grade_user';
	
	public function getTableName(){
        return $this->table;
    }
}
