<?php

namespace App\Http\Livewire\User;

use App\Mail\UserPasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{

    public $listRoute;
    public $addRoute;
    public $editRoute;
    public $viewRoute;

    public $user;
    public $userConnected;

    protected $listeners = [
        'confirmedGeneratePassword',
        'confirmedSetAccountState',
    ];

    public function mount()
    {
        $userConnected = Auth::user();
        if (isset($userConnected->id) && $userConnected->id) {
            $this->userConnected = $userConnected;
        } else {
            $userConnected = new User();
        }
    }

    public function render()
    {
        return view('livewire.user.show');
    }

    public function generatePassword()
    {
        $this->confirm(
            "Êtes-vous sûr de bien vouloir réinitialiser le mot de passe de <strong>" . $this->user->nom . " " . $this->user->prenom . "</strong> ?
            <small class='text-danger'>
                <strong>NB</strong>: un mail lui sera envoyé sur l'adresse <strong>" . $this->user->email . "</strong> avec son nouveau mot de passe généré.
            </small>", [
                'allowOutsideClick' => false,
                'confirmButtonColor' => '#ffc84b',
                'confirmButtonText' => 'Generer le mot de passe',
                'cancelButtonText' => 'Annuler',
                'onConfirmed' => 'confirmedGeneratePassword',
            ]);
    }

    public function setAccountState()
    {
        $this->confirm(
            'Êtes-vous sûr de bien vouloir ' . ($this->user->statut ? 'vérrouiller' : 'dévérrouiller') . ' le compte de <strong>' . $this->user->nom . ' ' . $this->user->prenom . '</strong> ?', [
                'allowOutsideClick' => false,
                'confirmButtonColor' => $this->user->statut ? '#ffc84b' : 'green',
                'confirmButtonText' => $this->user->statut ? 'Vérrouiller' : 'Dévérrouiller',
                'cancelButtonText' => 'Annuler',
                'onConfirmed' => 'confirmedSetAccountState',
            ]);
    }

    public function confirmedGeneratePassword()
    {
        // Do something
        $password = Str::random(8);
        $user = $this->user->toArray();
        $user['password'] = bcrypt($password);
        $this->user->update($user);
        $message = 'Le mot de passe de ' . $this->user->nom . ' ' . $this->user->prenom . ' a été généré avec succès';
        try {
            Mail::to($this->user->email)->send(new UserPasswordReset($this->user, $password));
            return redirect()->route($this->viewRoute['link'], $this->user)
                ->with('success', $message . " et envoyé par mail à l'adresse: " . $this->user->email);
        } catch (\Throwable $th) {
            return redirect()->route($this->viewRoute['link'], $this->user)
                ->with('warning', $message . ". Le nouveau mot de passe n'a pas pu être envoyé par mail à l'adresse: " . $this->user->email);
        }
    }

    public function confirmedSetAccountState()
    {
        // Do something
        $user = $this->user->toArray();
        $user['statut'] = $this->user->statut ? 0 : 1;
        $this->user->update($user);
        return redirect()->route($this->viewRoute['link'], $this->user)
            ->with('success', 'Compte de ' . $this->user->nom . ' ' . $this->user->prenom . 'a été ' . ($this->user->statut ? 'dévérrouillé' : 'vérrouillé') . ' avec succès.');
    }
}
