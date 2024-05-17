<div>
    <nav class="flex flex-col sm:flex-row">
        <button
            class="text-blue-800 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ $showCountries ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '' }}"
            wire:click="selectCountries">
            Countries
        </button>
        <button
            class="text-blue-800 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ $showCompetitions ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '' }}"
            wire:click="selectCompetitions">
            Competitions
        </button>
        <button
            class="text-blue-800 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ $showTeams ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '' }}"
            wire:click="selectTeams">
            Teams
        </button>
        <button
            class="text-blue-800 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ $showPlayers ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '' }}"
            wire:click="selectPlayers">
            Players
        </button>
    </nav>
    <div class="mt-4">
        @if ($showCountries)
            <livewire:football.countries />
        @endif

        @if ($showCompetitions)
            <livewire:football.competitions />
        @endif
        @if ($showTeams)
            <livewire:football.teams />
        @endif
        @if ($showPlayers)
            <livewire:football.players />
        @endif
    </div>
</div>
