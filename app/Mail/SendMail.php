<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\PDF;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

 $pdf = PDF::loadView('dynamic_email_template', $this->data);

return $this->from('ebms@islamicrelief.org')
    ->subject($this->data['name'] . ' Monthly Management Performance Report')
    ->view('mail')
    ->attachData($pdf->output(), "Monthly Management Performance Report.pdf")
    ->with('data', $this->data);

       
    }
}

