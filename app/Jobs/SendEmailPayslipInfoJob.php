<?php

namespace App\Jobs;

use App\Mail\PayslipInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailPayslipInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $createSalary;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($createSalary)
    {
        $this->createSalary = $createSalary;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->createSalary->employee->email, $this->createSalary->employee->name)
            ->send(new PayslipInfo($this->createSalary));
    }
}
