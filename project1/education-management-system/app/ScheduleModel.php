<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleModel extends Model
{
    use SoftDeletes;

    protected $fillable = array('name','from','to','except_date_time_json','impact_entity_and_entity_ids_json','sun','mon','tue','wed','thu','fri','sat','created_by','updated_by');

    protected $table = 'schedules';

    public function getTableName(){
        return $this->table;
    }
}
