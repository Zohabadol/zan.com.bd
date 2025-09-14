<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data; // Store the form data
    }

    public function build()
    {
        return $this->subject('New Contact Message')
                    ->view('emails.contact') // Ensure this view exists
                    ->with('data', $this->data);  // Pass the entire $data array to the view
    }
}
