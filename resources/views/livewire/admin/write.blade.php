<div>
    @if ($user)
    <form class="flex    rounded-2xl bg-blue-100 border border-blue-900 p-1  shadow m-2">
        <div class=" flex  text-center ">
            <textarea wire:model.lazy="text" rows="3" cols="110"
                class="relative  rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"></textarea>
                <i wire:click="writeMessage()" class=" self-end text-gray-500 hover:text-gray-700 mt-1 ml-1 text-xl p-2 cursor-pointer fas fa-paper-plane"></i>
        </div>

    </form>
    @endif

</div>
