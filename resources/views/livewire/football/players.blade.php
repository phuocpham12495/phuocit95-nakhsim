<div>
    <form wire:submit="load">
        <x-form-label>Player Name</x-form-label>
        <x-form-input wire:model="playerName"></x-form-input>
        @error('playerName')
            <div><em>{{ $message }}</em></div>
        @enderror
        <x-form-button wire:loading.class="opacity-50" class="mt-4">Load</x-form-button>
        <div wire:loading.block
            class="mt-4 animate-spin w-10 h-10 border-[3px] border-current border-t-transparent text-blue-600 rounded-full"
            role="status" aria-label="loading">
        </div>
    </form>
    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($players as $player)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ $player['player_image'] }}"
                        alt="NF" onerror="this.onerror=null; this.src='/img/sample-avatar.svg';">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Player name</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $player['player_name'] }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Complete name: {{ $player['player_complete_name'] }}</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Position: {{ $player['player_type'] }}</p>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Player key</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">{{ $player['player_key'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
