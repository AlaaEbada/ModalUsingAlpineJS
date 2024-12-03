<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{

    #[Validate('required|min:2|max:50')]
    public $name;
    #[Validate('required|email|unique:users')]
    public $email;
    #[Validate('required|min:5')]
    public $password;


    public function register()
    {

        $validated = $this->validate();

        $user = User::create($validated);


        $this->reset('name', 'email', 'password');

        session()->flash('success', 'User created successfully.');

        $this->dispatch('userCreated', $user);

        $this->dispatch('close-modal');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.register-form', compact('users'));
    }
}
