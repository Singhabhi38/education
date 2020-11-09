<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/5/2016
 * Time: 3:52 PM
 */

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SendEmailAddressConfirmationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event){
        $toName=$event->user['name'];
        $emailAddress = $event->user['email'];
        $emailTitle="Verify your email address."." ".date("Y/m/d H:i:s");
        $previewText="We need to verify your email.";
        $userId = $event->user['id'];
        $emailVerificationCode = $event->user['emailVerificationCode'];
        $emailVerificationLink = url('security/emailAddressVerification?code='.$emailVerificationCode."&"."email=".$emailAddress."&"."id=".$userId);
        $detailsLink = url('');

        Mail::send('emails.verify-email', // View Name -> resources/views/emails/verify-email.blade.php
            [
                'emailAddress' => $emailAddress,
				'toName' => $toName,
				'emailTitle' => $emailTitle,
				'previewText' => $previewText,
                'emailVerificationCode' => $emailVerificationCode,
                'emailVerificationLink' => $emailVerificationLink,
                'detailsLink' => $detailsLink,
			],
			function($message) use ($emailAddress, $emailTitle)
            {
                $message->to($emailAddress, $emailAddress)->subject($emailTitle);
            }
		);

    }
}