<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use App\Mail\EmailReminder;
use App\Todo;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder e-mails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request, Todo $todo) {
        date_default_timezone_set('Asia/Bangkok');
        $i = 0;
        $todo = Todo::whereYear('when', '=', date('Y'))->whereMonth('when', '=', date('m'))->whereDay('when', '=', date('d'))->get();
        foreach($todo as $todo)
        {
            $email = $todo->to;
            Mail::to($email)->send(new EmailReminder($todo));
            $i++;

            Todo::where('id', $todo->id)->update([
                'when' => date("Y-m-d", strtotime($todo->when . "+1 days")),
                'repeat' => $todo->repeat - 1
            ]);

            $del_check = Todo::find($todo->id);
            if($del_check->repeat <= 0){
                Todo::destroy($todo->id);
            }
        }
    }
}
