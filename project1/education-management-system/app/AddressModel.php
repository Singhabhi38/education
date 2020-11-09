<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AddressModel extends Model
{
//    use SoftDeletes;

    protected $table = 'addresses';

    protected $fillable = array('address', 'zone','district');


public function getTableName(){
    return $this->table;
}
}