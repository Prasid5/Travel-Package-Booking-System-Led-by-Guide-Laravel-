<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class emailconfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $mailmessage;
    /**
     * Create a new message instance.
     */
    public function __construct($message, $subject)
    {   
        $this->subject=$subject;
        $this->mailmessage=$message;
        //initial variable here
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {   //return subject
        return new Envelope(
            //subject: 'Emailconfirmation', For static message we can write here like this
            subject:$this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {   //return text message/view file
        return new Content(
            view: 'user.mailtourist',
            // text:'text-file',Instead of view we can use text. In text we send the view file without writing html tags.
            /* If private variable:
                with:[
                    'name'=>$this->detail['name],
                ]
            */
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {   //attach images, pdf, word file etc.
        return [];
    }
}
