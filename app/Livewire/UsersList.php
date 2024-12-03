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

    public ?User $selectedUser = null;

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
        // Delete the user
        $user->delete();

        // Clear the selected user if it's the same as the deleted user
        if ($this->selectedUser && $this->selectedUser->id === $user->id) {
            $this->selectedUser = null; // Use this if you allowed nullable type
            // Or use: $this->selectedUser = new User(); if not nullable
        }

        // Reset pagination to handle changes
        $this->resetPage();

        // Dispatch event
        $this->dispatch('userDeleted');
    }


    public function render()
    {
        return view('livewire.users-list');
    }
}
