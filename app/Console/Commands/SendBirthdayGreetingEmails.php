<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Employee;
use App\Mail\BirthdayEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthdayGreetingEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-greeting-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Send Birthday Greeting to Employee';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dayNow = Carbon::now()->day;
        $monthNow = Carbon::now()->month;

        $employees = Employee::where('status', 'Active')
                            ->whereMonth('date_of_birth', $monthNow)
                            ->whereDay('date_of_birth', $dayNow)
                            ->get();

        foreach ($employees as $employee) {
            Mail::to($employee->email)->send(new BirthdayEmail($employee));
        }
    }
}
