<?php

return [

    'user_model' => App\UserModel::class,

    'message_model' => Cmgmyr\Messenger\Models\Message::class,

    'participant_model' => Cmgmyr\Messenger\Models\Participant::class,

    'thread_model' => Cmgmyr\Messenger\Models\Thread::class,

    /**
     * Define custom database table names.
     */
    'messages_table' => 'messages',

    'participants_table' => 'message_participants',

    'threads_table' => 'message_thread',
];
