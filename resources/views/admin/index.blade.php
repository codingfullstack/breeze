<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="flex max-w-7xl mx-auto   rounded-lg shadow-lg ">
            <div class=" w-1/5 border-solid border-r-4 border-gray-600">
                <h3 class="px-4 py-2  border-b-4 border-gray-600">Users list</h3>
                @livewire('admin.users-list')
            </div>
            <div class="w-full">
                @livewire('admin.messages')
                @livewire('admin.write')
            </div>
        </div>
    </div>
</x-app-layout>
