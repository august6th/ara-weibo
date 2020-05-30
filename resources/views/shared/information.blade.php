@foreach (['red', 'orange', 'green', 'blue'] as $color)
    @if(session()->has($color))
        <div class="w-full">
            <div class="bg-{{$color}}-100 border-{{$color}}-400 text-{{$color}}-700 border px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Information</strong>
                <span class="block sm:inline">{{ session()->get($color) }}</span>
            </div>
        </div>
    @endif
@endforeach
