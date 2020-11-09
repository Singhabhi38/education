<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;

class RoleModel extends EntrustRole
{
   // use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = array('name', 'display_name','description');

    public function getTableName(){
        return $this->table;
    }

    public function users(){
        return $this->belongsToMany('App\UserModel','role_user','role_id','user_id');
    }
}