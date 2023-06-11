<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMsg extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build(){
        return $this->markdown('emails.contact.message')
       ->with([
           'name' => $this->contactData['name'],
           'email' => $this->contactData['email'],
           'subject' => $this->contactData['subject'],
           'message' => $this->contactData['message'],
           'phone' => $this->contactData['phone'],
       ])
       ->subject('New Contact Message');
   }





    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Köszönöm a megkeresésed!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.message',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
