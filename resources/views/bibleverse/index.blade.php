<x-layout>
    <x-slot:title>Bible Verse List</x-slot:title>
    <x-slot:heading>Create and save bible verse</x-slot:heading>
    <x-slot:description>Psalm 119:11 - I have hidden your word in my heart
        that I might not sin against you.</x-slot:description>

    <div class="mx-auto max-w-2xl lg:mx-0 m-5">
        <x-button href="/bibleverses/create">Add Bible Verse</x-button>
    </div>

    <ul class="space-y-4">
        @foreach ($bibleverses as $bibleverse)
            <li class='flex items-center justify-center'>
                <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white mb-4">
                    <a href="bibleverses/{{ $bibleverse->id }}" class="text-blue-500 hover:underline"><strong>Verse:
                            {{ $bibleverse->verse }}</strong></a>
                    <div class="text-sm">Content: {{ $bibleverse->content }}</div>
                </div>
            </li>
        @endforeach
    </ul>
    <div>{{ $bibleverses->links() }}</div>
</x-layout>
