<?php
/**
 * Created by PhpStorm.
 * User: Krishna
 * Date: 10/2/2016
 * Time: 5:42 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionModel extends Model
{
    use SoftDeletes;

    protected $fillable = array(
        'user_id',
        'name',
        'type',
        'bill_no',
        'amount',
        'remarks',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    protected $table = 'transactions';

    public function getTableName(){
        return $this->table;
    }
}