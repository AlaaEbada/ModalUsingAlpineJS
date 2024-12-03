<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    #[Url(as : 's' , history: true,)]
    public $search;
    public User $selectedUser;

    #[Computed()]
    public function users()
    {
        return User::latest()
        ->where('name','like',"%{$this->search}%")
        ->paginate(5);
    }

    public function viewUser(User $user)
    {
        $this->selectedUser = $user;
        $this->dispatch('open-modal', name: 'user-details');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        $this->dispatch('userDeleted');
    }
    public function render()
    {
        return view('livewire.users-list');
    }
}
