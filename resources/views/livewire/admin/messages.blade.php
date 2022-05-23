<div id="scroll" wire:poll.5s='fireMessage' class="flex flex-col h-60 overflow-auto ">

    @if ($user === null)
        <div class="text-center p-6 text-lg">Select the User</div>
    @else
        @foreach ($message as $item)
            @if ($item->sender == $me)
                <div class="self-end  bg-blue-300 rounded-lg my-3  w-3/12 ">
                @else
                    <div class="self-start bg-red-300 rounded-lg my-3  w-3/12">
            @endif
            <div class=" m-2">{{ $item->text }}</div>

</div>
@endforeach
@endif
<script>
    var objDiv = document.getElementById('scroll');
    objDiv.scrollTop = objDiv.scrollHeight
</script>
</div>
