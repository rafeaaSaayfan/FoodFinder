<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    public $restaurantName;
    public $subject;
    public $messageContent;

    /**
     * Create a new message instance.
     */
    public function __construct($restaurantName, $subject, $messageContent)
    {
        $this->restaurantName = $restaurantName;
        $this->subject = $subject;
        $this->messageContent = $messageContent;
    }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $restauarnt_name = $this->restaurantName;
        $subjectContent = $this->subject;
        $messageContent = $this->messageContent;

        return $this->subject($subjectContent)
        ->view('mails.mailPage')->with([
            'restauarnt_name' => $restauarnt_name,
            'messageContent' => $messageContent,
        ]);
    }
}
