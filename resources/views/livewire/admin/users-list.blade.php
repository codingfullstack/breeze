
<div > <!-- Added this wrapping div -->
    <div  class="h-52 overflow-auto">


        @foreach ( $users as $user)
        <div wire:click="select({{ $user->id }})" class="  d-block my-3 hover:cursor-pointer text-black font-bold py-2 px-4 rounded">
            {{$user->name}}
          </div>
        @endforeach
    </div>

</div>

