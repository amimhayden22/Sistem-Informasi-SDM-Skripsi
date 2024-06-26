<?php

namespace App\Mail;

use App\Models\BusinessTrip;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationRequestLeaveBT extends Mailable
{
    use Queueable, SerializesModels;

    public $createBusinessTrip;
    public $for;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BusinessTrip $createBusinessTrip, $for)
    {
        $this->createBusinessTrip = $createBusinessTrip;
        $this->for = $for;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.business_trip_application')
                    ->subject('Karyawan Mengajukan Perjalanan Dinas');
    }
}
