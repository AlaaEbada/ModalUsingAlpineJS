<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>


    
    </head>
    <body class="p-10">
        <x-modal title="Modal 1" name="Modal1">
            @slot('body')
                <H1 class="text-pink-500 font-bold">This Is Body</H1>
            @endslot
        </x-modal>

        
        <x-modal title="Modal 2" name="Modal2">
            @slot('body')
                <H1 class="text-pink-500 font-bold">This Is Body</H1>
            @endslot
        </x-modal>

        <button x-data x-on:click="$dispatch('open-modal', {name: 'Modal1'})" 
        class="px-3 py-1 bg-teal-500 text-white rounded"> Open Modal 1</button>
        
        <button x-data x-on:click="$dispatch('open-modal', {name: 'Modal2'})" 
        class="px-3 py-1 bg-teal-500 text-white rounded"> Open Modal 2</button>

    </body>
</html>
