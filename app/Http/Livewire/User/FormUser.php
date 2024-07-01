<?php

namespace App\Http\Livewire\User;

use App\Mail\UserAccess;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class FormUser extends Component
{
    public $user;
    public $listRoute;
    public $addRoute;
    public $showRoute;

    public $nom;
    public $prenom;
    public $email;
    public $role; //handler-admin agent-admin handler-op agent-op prospect
    public $adresse;
    public $statut;

    public $roles; //handler-admin agent-admin handler-op agent-op prospect

    public function mount()
    {
        $userConnect = Auth::user();
        switch ($userConnect->role) {
            case 'handler-admin':
                $this->roles = ['handler-admin', 'agent-admin'];
                break;
            case 'handler-op':
                $this->roles = ['handler-op', 'agent-op'];
                break;

            default:
                $this->roles = [];
                break;
        }

        if ($this->user->id) {
            $this->nom = $this->user->nom ? $this->user->nom : '';
            $this->prenom = $this->user->prenom ? $this->user->prenom : '';
            $this->email = $this->user->email ? $this->user->email : '';
            $this->role = $this->user->role ? $this->user->role : '';
            $this->adresse = $this->user->adresse ? $this->user->adresse : '';
            $this->statut = $this->user->statut === 1 ? true : false;
        }
    }

    public function render()
    {
        return view('livewire.user.form-user');
    }

    public function onSubmitForm()
    {
        $excepted = $this->user->id ? ',' . $this->user->id : '';

        $validatedData = $this->validate([
            'nom' => 'required',
            'prenom' => 'required', 
            'email' => 'required|unique:users,email' . $excepted,
            'role' => 'required',
            'adresse' => 'nullable',
            'statut' => 'nullable',
        ]);
        if ($this->user->id) {
            $this->updatedForm($validatedData);
        } else {
            $this->storedForm($validatedData);
        }
    }
    
    public function storedForm($dataInput)
    {
        $userConnect = Auth::user();
        if ($userConnect->operation_paysan_id) {
            $dataInput['operation_paysan_id'] = $userConnect->operation_paysan_id;
        }
        $password = Str::random(8);
        $dataInput['password'] = bcrypt($password);
        $user = User::create($dataInput);
        try {
            Mail::to($user->email)->send(new UserAccess($user, $password));
            return redirect()->route($this->listRoute['link'])->with('success', "l'utilisateur " . $user->nom . ' ' . $user->prenom . '  enregistré avec succès !!  ' . "Son mot de passe de connexion lui a été envoyé par mail à l'adresse: " . $user->email);
        } catch (\Throwable $th) {
            return redirect()->route($this->listRoute['link'])->with('warning', "l'utilisateur " . $user->nom . ' ' . $user->prenom . '  enregistré avec succès !!  ' . "Son mot de passe de connexion n'a pas pu être envoyé par mail à l'adresse: " . $user->email);
        }
    }

    public function updatedForm($dataInput)
    {
        if ($this->user->email !== $dataInput['email'] && !$this->user->email_verified_at) {
            $password = Str::random(8);
            $dataInput['password'] = bcrypt($password);
        } else {
            $dataInput['email'] = $this->user->email;
        }

        $this->user->update($dataInput);
        if ($this->user->email !== $dataInput['email'] && !$this->user->email_verified_at) {
            try {
                Mail::to($this->user->email)->send(new UserAccess($this->user, $password));
            } catch (\Throwable $th) {
                return redirect()->route($this->showRoute['link'], $this->user)->with('warning', "l'utilisateur " . $this->user->nom . ' ' . $this->user->prenom . '  enregistré avec succès !!  ' . "Son mot de passe de connexion n'a pas pu être envoyé par mail à l'adresse: " . $this->user->email);
            }
        }
        return redirect()->route($this->showRoute['link'], $this->user)->with('success', "l'utilisateur" . $this->user->nom . ' ' . $this->user->prenom . '  mise à jour avec succès !!!');
    }
}