@props(['title', 'name'])

<div 
    x-data = "{ show : false, name: '{{ $name }}' }"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"


class="fixed z-50 inset-0 ">

    {{-- Gray Background --}}`
    <div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-40"></div>


    <div class="bg-white rounded-lg fixed inset-0 p-6 m-auto max-w-2xl text-black" style="max-height: 500px;">
        @if(isset($title))
            <div class="py-3 flex item-center justify-center" >
                {{ $title }}
            </div>
        @endif


            <div class="py-3 flex item-center justify-center" >
                {{ $body }}
            </div>

        <button x-on:click="show = false" >X</button>


        <button x-on:click="show = false" class="px-3 py-1 bg-red-500 text-white rounded"> Close Modal</button>

    </div>
</div>