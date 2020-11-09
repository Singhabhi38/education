<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustPermission;

class PermissionModel extends EntrustPermission{

    use SoftDeletes;

    protected $fillable = array('name');

    protected $table = 'permissions';

    public function getTableName(){
        return $this->table;
    }

}
