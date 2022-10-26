<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nameSender, $emailSender, $subject, $mailData)
    {
        $this->nameSender = $nameSender;
        $this->emailSender = $emailSender;
        $this->subject = $subject;
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return
     */
    public function build()
    {
        /* dd($this->mailData); */

        // Note :
        // from => L'email provient du serveur OVH qui redristribue à différentes
        // replayTo => Permet de répondre à l'expéditeur via le bouton "Répondre"
        $email = $this->from(env('MAIL_USERNAME'), env('APP_DOMAIN')) 
            ->replyTo($this->emailSender, $this->nameSender) 
            ->subject($this->subject)
            ->view('emails.send-email');

        // $attachments is an array with file paths of attachments
        // Si des fichiers sont uploadés
        if (array_key_exists('files', $this->mailData)) {
            foreach ($this->mailData['files'] as $file) {
                /*  dd($file->getRealPath());
                $email->attach($file->getPathName(), [
                    'as' => $file->getClientOriginalName(),
                ]); */
                $email->attachData($file, $file->getClientOriginalName());
            }
        }

        return $email;
    }
}
