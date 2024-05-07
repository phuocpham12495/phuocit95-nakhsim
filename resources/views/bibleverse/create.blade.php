<x-layout>
    <x-slot:title>Add Bible Verse</x-slot:title>
    <x-slot:heading>Add Bible Verse</x-slot:heading>
    <x-slot:description>Add a new bible verse</x-slot:description>

    <div class="bg-amber-100 border-t border-b border-amber-500 text-amber-700 px-4 py-3 mb-4" role="alert">
        <p class="font-bold">Create and save a bible verse</p>
        <p class="text-sm">Psalm 119:11 - I have hidden your word in my heart that I
            might not sin against you.</p>
    </div>

    <!-- component -->
    <form action="/bibleverses" method="POST">
        @csrf
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input id="verse" name="verse" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                spellcheck="false" placeholder="Verse" type="text">
            <textarea id="content" name="content"
                class="mb-2 description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false"
                placeholder="Content"></textarea>
            <div class="buttons flex justify-end gap-x-2">
                <x-button href="/bibleverses">Cancel</x-button>
                <x-form-button>Post</x-form-button>
            </div>
        </div>
    </form>

</x-layout>
