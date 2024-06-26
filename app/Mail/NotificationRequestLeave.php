<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;

class NotificationRequestLeave extends Mailable
{
    use Queueable, SerializesModels;

    public $createTransaction;
    public $for;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $createTransaction, $for)
    {
        $this->createTransaction = $createTransaction;
        $this->for = $for;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.apply_for_leave')
                    ->subject('Karyawan Mengajukan Izin Kerja');
    }
}
