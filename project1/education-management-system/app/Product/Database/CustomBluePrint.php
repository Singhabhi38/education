<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/11/2016
 * Time: 9:32 AM
 */

namespace App\Product\Database;


use Illuminate\Database\Schema\Blueprint;

class CustomBluePrint extends Blueprint{

    public function nepaliTimeStamps(){
        $this->string('created_at_np');
        $this->string('updated_at_np');
    }

}