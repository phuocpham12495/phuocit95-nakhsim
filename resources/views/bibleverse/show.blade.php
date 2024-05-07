<x-layout>
    <x-slot:title>Bible Verse</x-slot:title>
    <x-slot:heading>Bible Verse</x-slot:heading>
    <x-slot:description>A bible verse detail</x-slot:description>

    <div class='flex items-center justify-center'>
        <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white mb-4">
            <h3><strong>{{ $bibleverse['verse'] }}</strong></h3>
            <p>{{ $bibleverse['content'] }}</p>
        </div>
    </div>
    {{-- <div class="mt-5">
        <form method="POST" action="/me/jobs/{{ $job->id }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
        </form>
    </div> --}}
    <div class="buttons flex justify-end gap-x-2">
        <x-button href="/bibleverses/{{ $bibleverse->id }}/edit">Edit</x-button>
        <x-form-button form="form-delete">Delete</x-form-button>
    </div>
    <form method="POST" action="/bibleverses/{{ $bibleverse->id }}" class="hidden" id="form-delete">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
