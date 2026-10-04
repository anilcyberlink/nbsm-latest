<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

        protected $value;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->data=$value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $emailfrom = env('MAIL_USERNAME');
        $message_subject = env('REVIEW_SUBJECT');
        return $this->from($emailfrom)
            ->view('themes.default.mail.proposal',[
                'firstname'=>$request->firstname,
                 'lastname'=>$request->lastname,
                  'email'=>$request->email,
                   'phone'=>$request->phone,
                    'position'=>$request->position,
                     'company'=>$request->company,
                      'country'=>$request->country,
                       'postcode'=>$request->postcode,
                        'industry'=>$request->industry,
                         'revenue'=>$request->revenue,
                          'option'=>$request->option,
                          'comment'=>$request->comment,
                           'rfp'=> $request->file('rfp')
                          
                ])
            ->subject($message_subject)
            ->attach($this->data['rfp']->getRealPath(),[
                'as'=> $this->data['rfp']->getClientOriginalName()
                ]);
                
    }
}
