<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Models\Contact;
use Models\Setting;

class SendContactAdmin extends Mailable
{
    use Queueable, SerializesModels;
    protected $contact;
    protected $setting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact, Setting $setting)
    {
        $this->contact = $contact;
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->setting->email, $this->setting->name)
            ->view('emails.contact-admin')
            ->with([
                'name' => $this->contact->name,
                'email' => $this->contact->email,
                'phone' => $this->contact->phone,
            ]);
    }
}
