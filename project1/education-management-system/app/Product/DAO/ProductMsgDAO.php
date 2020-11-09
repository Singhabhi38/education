<?php
namespace App\Product\DAO;

use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Log\LogUtil;
use App\Product\DAOUtil\ProductMsgDTOTransformer;

Class ProductMsgDAO implements IProductMsgDAO {

    private $LOGGER;
    private $productMsgDTOTransformer;

    public function __construct(){
        $this->productMsgDTOTransformer = new ProductMsgDTOTransformer();
        $this->LOGGER = LogUtil::getLoggerInstance(ProductMsgDAO::class);
    }

    public function findAll($columns){

        $currentUserId = Auth::user()->id;
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();

        return $threads;
    }

    public function findById($id, $columns){
        try {
            $thread = Thread::findOrFail($id);
            $creator = $thread->creator()->email;
//            dd($creator);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect('messages');
        }
        $result = array();
        $result['thread'] = $thread;
        $result['creator'] = $creator;
        return $result;
    }

    public function findByIds($ids, $columns){

    }

    public function create($message){
        $result = $this->productMsgDTOTransformer->formatDataToDb($message);
        $this->LOGGER->info('creating message');
        $thread = Thread::create(
            [
                'subject' => $result['subject'],
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $result['body'],
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );

        // Recipients
        $thread->addParticipant($result['recipients']);
        return redirect('messages');
    }

    public function update($id){

        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect('messages/' . $id);
    }

    public function deleteById($id){

    }

    public function deleteByIds($ids)
    {

    }


}