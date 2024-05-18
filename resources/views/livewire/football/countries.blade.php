<div>
    <form wire:submit="load">
        <button wire:loading.class="opacity-50" type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Load</button>
        <div wire:loading.block
            class="mt-4 animate-spin w-10 h-10 border-[3px] border-current border-t-transparent text-blue-600 rounded-full"
            role="status" aria-label="loading">
        </div>
        <div>
            <em>{{ $errorMsg }}</em>
        </div>
    </form>

    <!-- end loading icon -->
    <ul wire:loading.remove role="list" class="divide-y divide-gray-100">
        @foreach ($countries as $country)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ $country['country_logo'] }}"
                        alt="NF" onerror="this.onerror=null; this.src='/img/sample-avatar.svg';">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $country['country_name'] }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Country id:
                            {{ $country['country_id'] }}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- <div>{{ $countries->links() }}</div> --}}
</div>
