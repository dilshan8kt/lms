<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Leave;

class LeaveStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $leave;
    public $emp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
        $this->emp = User::findOrFail($leave->emp_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.leave-mail');
    }
}
