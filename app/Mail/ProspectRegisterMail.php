<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProspectRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $uniqueCode; // Utilisez uniqueCode au lieu de verification_code

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $uniqueCode, string $password = null)
    {
        $this->user = $user;
        $this->password = $password;
        $this->uniqueCode = $uniqueCode; // Utilisez uniqueCode au lieu de verification_code
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('enabel@senegal.com', 'Enabel')
            ->subject('Accès de la plateforme')
            ->view('mail.prospect-register-mail')
            ->with([
                'user' => $this->user,
                'password' => $this->password,
                'uniqueCode' => $this->uniqueCode,
            ]);
    }
}
