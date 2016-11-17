<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivityLogger implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $_user_id, $_logMessage;
    /**
     * Create a new job instance.
     *
     * @param $user_id
     * @param $logMessage
     */
    public function __construct($user_id, $logMessage)
    {
        $this->_user_id = $user_id;
        $this->_logMessage = $logMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \App\ActivityLogger::create(['user_id' => $this->_user_id, 'logMessage' => $this->_logMessage]);
    }
}
