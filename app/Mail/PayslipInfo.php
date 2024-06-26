<?php

namespace App\Mail;

use App\Models\Salary;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayslipInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $createSalary;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Salary $createSalary)
    {
        $this->createSalary = $createSalary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        setlocale(LC_ALL, 'IND');
        $monthYear = strftime('%B %Y');

        if ($this->createSalary->type === 'THR Slip') {
            $subject = 'Holiday Allowance Slip';
        } else {
            $subject = 'Payslip '.$monthYear;
        }


        return $this->markdown('emails.salary.payslip_info')
                    ->subject($subject);
    }
}
