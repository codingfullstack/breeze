<div>

    <select  wire:model="sortBy" wire:change="sort"  >
        <option value="default">Default sorting</option>
        <option value="latest">Sort by Latest Posts</option>
        <option value="oldest">Sort by Oldest Posts</option>
        <option value="mostLike">Sort by Most likes Posts</option>
        <option value="atLeast">Sort by Least liked Post</option>
    </select>
    <div class=" flex justify-start flex-wrap w-full  ">
        @foreach ($posts as $post)
            {{-- {{ $post }} --}}

            <div class="flex mx-1 my-5 ">
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
                                        class=" inline-block px-6 py-2.5 bg-red-600 text-black-500 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                        <div>
                            <i @auth wire:click="save({{ $post->id }})"@endauth class=" my-2 fa-solid fa-heart text-red-600 text-xl"></i>
                               {{ $post->likes_count}}
                           </div>
                        {{-- @livewire('likes.heart-like', compact('post')) --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
