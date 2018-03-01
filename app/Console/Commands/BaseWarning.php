<?php

namespace App\Console\Commands;

use App\Models\BiWarningUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;


abstract class BaseWarning extends BaseCommand
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function sendEmail($data, $subject = null)
    {
        $subject = $subject ? : $this->description;
        $user = BiWarningUser::get();
        //$user->notify(new \App\Notifications\test());
        Notification::send($user, new \App\Notifications\Warning($data, $subject));
    }

    protected function warning($msg)
    {
        Log::warning($this->signature . ': ' . $msg);
    }
}