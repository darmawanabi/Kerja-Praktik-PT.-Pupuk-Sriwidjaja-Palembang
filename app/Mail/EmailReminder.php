<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\PostPerizinan;
use App\Todo;

class EmailReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $todo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        date_default_timezone_set('Asia/Bangkok');
        $todo = $this->todo;
        $post = PostPerizinan::find($todo->post_id);
        return $this->subject('Reminder Untuk Perizinan | ' . $post->nama)->markdown('emails.sites.reminder', compact('todo'));
    }
}
