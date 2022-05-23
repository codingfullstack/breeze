<div wire:click='selectUser({{1}})'
    class="fixed  rounded-lg border-t-2 border-l-2 border-gray-400  w-96 bottom-0 right-0 bg-gray-200 ">
    @if ($modalShow === false)
        <div wire:click="modal" class=" ml-2 cursor-pointer">Contact</div>
    @else
        <div class="flex justify-between items-center border-b-2 border-gray-400">
            <div class="  ml-2 transition duration-700  ease-in-out">Chat with the administrator!</div>
            <i wire:click="modalFalse" class="mr-2 cursor-pointer fa-solid fa-xmark"></i>
        </div>

        @livewire('admin.messages')
        @livewire('admin.write')
    @endif
</div>
