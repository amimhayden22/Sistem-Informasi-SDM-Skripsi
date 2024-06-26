<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;

class RequestApproveLeave extends Mailable
{
    use Queueable, SerializesModels;

    public $updateTransaction;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $updateTransaction)
    {
        $this->updateTransaction = $updateTransaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.approve_for_leave')
                    ->subject('Cuti Karyawan Disetujui');
    }
}
