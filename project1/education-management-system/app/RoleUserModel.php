<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUserModel extends Model{

    protected $fillable = array('role_id','user_id');

    protected $table = 'role_user';

    public function getTableName(){
        return $this->table;
    }
}