<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Cmgmyr\Messenger\Traits\Messagable;

class UserModel extends Model
{
    use SoftDeletes, EntrustUserTrait {
        SoftDeletes::restore as sfRestore;
        EntrustUserTrait::restore as euRestore;
    }

    use Messagable;

    public function restore() {
        $this->sfRestore();
        Cache::tags(Config::get('entrust.role_user_table'))->flush();
    }

    protected $fillable = array('name',
                                'email',
                                'password',
                                'created_at_np',
                                'updated_at_np',
                                'email_verification_code');

    protected $table = 'users';

    public function getTableName(){
        return $this->table;
    }

    /**
     * Get the User Detail associated with the user.
     */
    public function userDetail(){
        return $this->hasOne('App\UserDetailModel','user_id');
    }

    /**
     * Get the User Detail associated with the user.
     */
    public function attendanceRecords(){
        return $this->hasMany('App\AttendanceModel','user_id');
    }
    
    public function courses(){
		return $this->belongsToMany('App\CourseModel','course_user','user_id','course_id');
	}
	
	public function grades(){
		return $this->belongsToMany('App\GradeModel','grade_user','user_id','grade_id');
	}

    public function roles(){
        return $this->belongsToMany('App\RoleModel','role_user','user_id','role_id');
    }
}
