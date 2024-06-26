<?php

namespace App\Mail;

use App\Models\BusinessTrip;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnapprovedLeaveBT extends Mailable
{
    use Queueable, SerializesModels;

    public $updateBusinessTrip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BusinessTrip $updateBusinessTrip)
    {
        $this->updateBusinessTrip = $updateBusinessTrip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.business_trip_unapproved')
                    ->subject('Pengajuan Perjalanan Dinas Tidak Disetujui');
    }
}
