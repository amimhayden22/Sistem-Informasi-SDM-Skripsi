<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\WfhTransaction;

class UnapprovedWFH extends Mailable
{
    use Queueable, SerializesModels;

    public $updateWfhTransaction;
    public $clickup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(WfhTransaction $updateWfhTransaction, $clickup)
    {
        $this->updateWfhTransaction = $updateWfhTransaction;
        $this->clickup = $clickup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.unapproved_wfh')
                    ->subject('Pengajuan WFH Tidak Disetujui');
    }
}
