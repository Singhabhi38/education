<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarksModel extends Model
{
    use SoftDeletes;

    protected $fillable=['name','exam_id','user_id','remarks'];

    protected $table='marks';
}
