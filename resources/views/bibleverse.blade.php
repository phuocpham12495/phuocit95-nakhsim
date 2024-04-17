<x-layout>
    <x-slot:title>Bible Verse</x-slot:title>
    <x-slot:heading>Create and save bible verse</x-slot:heading>
    <x-slot:description>Psalm 119:11 - I have hidden your word in my heart
        that I might not sin against you.</x-slot:description>

    <div class="mx-auto max-w-2xl lg:mx-0 m-5">
        <x-button href="/bibleverse/create">Add Bible Verse</x-button>
    </div>

    <div class="space-y-4">
        @foreach ($person['bibleverses'] as $bibleverse)
            <div class="block px-4 py-6 border border-gray-200 rounded-lg">
                <a href="bibleverse/{{ $bibleverse['id'] }}" class="text-blue-500 hover:underline"><strong>Verse:
                        {{ $bibleverse['verse'] }}</strong></a>
                <div class="text-sm">Content: {{ $bibleverse->content }}</div>
            </div>
        @endforeach
    </div>
    <div>{{ $person['bibleverses']->links() }}</div>
</x-layout>
