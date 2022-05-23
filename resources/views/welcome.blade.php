<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('post.most-like')
                <div class="flex mb-4">


                    <div class=" flex justify-between flex-wrap w-full  ">
                        @foreach ($posts as $post)
                            <div class="flex my-5 ">
                                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                    <a href="{{ route('posts.show', [$post->id]) }}">
                                        <img class="rounded-t-lg" src="{{ asset('storage/' . $post->photo) }}" alt="" />
                                    </a>
                                    <div class="p-6">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $post->title }}</h5>
                                        {{-- <p class="text-gray-700 text-base mb-4">
                                            {{ $post->text }}
                                        </p> --}}
                                        <div class="flex justify-between">
                                            @can('delete', $post)
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class=" inline-block px-6 py-2.5 bg-red-600 text-black-500 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                        @livewire('likes.heart-like', compact('post'))
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
