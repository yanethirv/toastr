<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users, $name, $email, $password;

    public function render()
    {
        $this->users = User::latest()->get();
        return view('livewire.users');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|max:190|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->name = '';
        $this->email = '';
        $this->password = '';

        //session()->flash('message',  'Usuario creado!');

        //Enviamos el evento a la vista - Método success
        $this->success();
    }

    public function success()
    {
        $this->dispatchBrowserEvent('alert', ['message' => 'Usuario creado!']);
    }
}
