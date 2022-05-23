<div  class="">
    @foreach ($count as $post)
        <div class="flex my-5  ">
            <div class="rounded-lg  mx-auto  shadow-lg w-4/5 ">
                <a class="" href="{{ route('posts.show', [$post->id]) }}">
                    <img class=" rounded-t-lg w-full h-96" src="{{ asset('storage/' . $post->photo) }}" alt="" />
                </a>
                <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $post->title }}</h5>
                    <div class="text-gray-500">Categories:</div>
                    @foreach ($post->categories as $item )
                        <p class="inline text-gray-400 text-sm mb-4">
                        {{ $item->name}}
                    </p>
                    @endforeach

                    <div class="flex justify-between">
                        @can('delete', $post)
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class=" inline-block px-6 py-2.5 bg-red-600 text-black-500 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete
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
