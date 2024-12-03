<div class="p-6 bg-gray-100 rounded-lg shadow-lg max-w-md mx-auto w-full">
    <form wire:submit.prevent="register" class="space-y-4">
        <h2 class="text-2xl font-semibold text-gray-700">Create New User</h2>
        <!-- Name Field -->

        @if (session()->has('success'))
            <div class="alert alert-success flex flex-row-reverse justify-between ">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                <span> {{ session()->get('success') }}  </span>
            </div>
        @endif

        <div>
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input
                id="name"
                wire:model="name"
                type="text"
                placeholder="Enter name"
                class="block w-full mt-1 px-4 py-2 text-gray-700 bg-white border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
            >
            @error('name')
                <span class="mt-2 text-sm text-red-500 p-2">
                    {{ $message }}
                </span>
            @enderror

        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input
                id="email"
                wire:model="email"
                type="email"
                placeholder="Enter email"
                class="block w-full mt-1 px-4 py-2 text-gray-700 bg-white border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
            >

            @error('email')
                <span class="mt-2 text-sm text-red-500 p-2 ">
                    {{ $message }}
                </span>
            @enderror

        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input
                id="password"
                wire:model="password"
                type="password"
                placeholder="Enter password"
                class="block w-full mt-1 px-4 py-2 text-gray-700 bg-white border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:outline-none"
            >

            @error('password')
                <span class="mt-2 text-sm text-red-500 p-2 ">
                    {{ $message }}
                </span>
            @enderror

        </div>




        <button
        type="submit"
        wire:loading.attr="disabled"
        class="w-full h-12 px-4 py-2 mt-3 text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 focus:ring-offset-1 focus:outline-none relative flex justify-center items-center"
        >
            <!-- Spinner -->
            <svg
                wire:loading
                wire:target="register"
                class="absolute animate-spin h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                ></path>
            </svg>

            <!-- Button Text -->
            <span wire:loading.remove wire:target="register">
                Create User
            </span>
        </button>

    </form>


</div>
