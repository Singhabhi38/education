<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/5/2016
 * Time: 3:52 PM
 */

namespace App\Listeners;

use App\Events\TransactionCreated;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class TransactionCreatedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //d
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(TransactionCreated $event){
        // further processing to inform admins or accountant (email or notifications)
        dd($event->transaction);
    }
}