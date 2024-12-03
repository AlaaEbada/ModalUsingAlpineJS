<!-- Users List -->
<div class="users max-w-md m-auto" wire:poll>
    <div wire:offline>
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
            </div>
        </div>
    </div>


    <div class="flex justify-center" wire:offline.remove>
        <input placeholder="Search... " type="text" wire:model.live.debounce.500ms="search"
            class="block\ w-50 mt-1 px-4 py-2 text-gray-700 bg-white border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
    </div>

    <h1 class="text-center my-5">All Users</h1>

    <ul class="mt-4 space-y-2" wire:offline.remove>
        @foreach ($this->users as $user)
            <li class="px-4 py-2 bg-white border rounded-lg shadow-sm flex justify-between items-center">
                <p>{{ $user->name }}</p>

                <div class="flex space-x-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    wire:click="viewUser({{ $user }})">
                    View
                </button>

                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                wire:confirm="Are you sure you want to delete this User?"
                wire:click="deleteUser({{ $user }})">
                    Delete
                </button>
                </div>


            </li>
        @endforeach
    </ul>

    <div class="mt-4" wire:offline.remove>
        {{ $this->users->links() }}
    </div>

    <x-modal title="Users Details" name="user-details">
        @slot('body')
            @if ($selectedUser)
                <div>
                    <h1 class="text-pink-500 font-bold">Name: {{ $selectedUser->name }}</h1>
                    <p>Email : {{ $selectedUser->email }}</p>
                </div>
            @else
                <p>No user selected.</p>
            @endif
        @endslot
    </x-modal>

</div>
