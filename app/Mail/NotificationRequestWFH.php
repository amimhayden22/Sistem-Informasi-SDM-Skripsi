<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\WfhTransaction;

class NotificationRequestWFH extends Mailable
{
    use Queueable, SerializesModels;

    public $createWfhTransaction;
    public $for;
    public $clickup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(WfhTransaction $createWfhTransaction, $for, $clickup)
    {
        $this->createWfhTransaction = $createWfhTransaction;
        $this->for = $for;
        $this->clickup = $clickup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.apply_for_wfh')
                    ->subject('Karyawan Mengajukan WFH');
    }
}
