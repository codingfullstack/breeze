<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>



    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  rounded-lg shadow-lg ">

            <div class="w-full ">

                <img class="rounded-lg object-fill mx-auto my-5 h-44 w-96"
                    src="{{asset('storage/'.$post->photo)}}" alt="" />



                <div class="p-6">
                    <h3 class="text-gray-900  font-bold uppercase mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-700 text-base mb-4">
                        {{ $post->text }}
                    </p>
                </div>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}">
                    <button
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Edit <i class="far fa-edit"></i>
                    </button>

                </a>
            @endcan

            </div>

        </div>
    </div>
</x-app-layout>
