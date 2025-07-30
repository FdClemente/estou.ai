<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Contact message mailable
 *
 * This class builds the email sent from the contact form. It accepts the
 * sender's name, email and message and passes them to a Blade view. The
 * subject line is intentionally generic; feel free to customise it via
 * localisation or additional properties.
 */
class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The sender's name.
     */
    public string $name;

    /**
     * The sender's email address.
     */
    public string $email;

    /**
     * The message content.
     */
    public string $messageContent;

    /**
     * Create a new message instance.
     */
    public function __construct(string $name, string $email, string $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this
            ->subject('Nova mensagem de contacto')
            ->view('emails.contact-message')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'messageContent' => $this->messageContent,
            ]);
    }
}