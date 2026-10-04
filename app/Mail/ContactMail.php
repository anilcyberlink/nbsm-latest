<?php

namespace App\Mail;

use App\Model\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))
            ->view('emails.contact')
            ->with([
                'email'     => $this->contact->email,
                'firstname' => $this->contact->first_name,
                'lastname'  => $this->contact->last_name,
                'phone'     => $this->contact->contact,
                'company'   => $this->contact->company,
                'comments'  => $this->contact->comments,
            ])
            ->subject(env('MESSAGE_ORDER'));
    }
}
