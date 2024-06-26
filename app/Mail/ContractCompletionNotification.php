<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContractCompletionNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, $name)
    {
        $this->employee = $employee;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.employee.contract_completion', [
            'employee' => $this->employee,
            'name' => $this->name,
        ])
        ->subject('Pemberitahuan: Kontrak karyawan a.n. '.$this->employee->name.' hampir selesai!');
    }
}
