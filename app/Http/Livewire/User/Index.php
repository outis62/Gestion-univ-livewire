<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $addRoute;
    public $viewRoute;
    
    public function render()
    {
        return view('livewire.user.index');
    }
}