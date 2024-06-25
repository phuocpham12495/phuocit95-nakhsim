<x-layout>
    <x-slot:title>Post List</x-slot:title>
    <x-slot:heading>Post List</x-slot:heading>
    <x-slot:description>All posts</x-slot:description>

    <div class="mx-auto max-w-2xl lg:mx-0 m-5">
        <x-button href="/posts/create">Add Post</x-button>
    </div>

    <ul class="space-y-4">
        @foreach ($posts as $post)
            <!-- component -->
            <li class="flex items-center justify-center">
                <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white mb-4">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center space-x-3">
                            <img class="h-8 w-8 rounded-full" src="/img/sample-avatar.svg" alt="">
                            <div class="text-lg font-bold text-slate-700">{{ $post->user->name }}</div>
                        </div>
                        <div class="flex items-center space-x-8">
                            {{-- <button
                                class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Category</button> --}}
                            <div class="text-xs text-neutral-500">
                                {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</div>
                        </div>
                    </div>

                    <div class="mt-4 mb-6">
                        <a href="/posts/{{ $post->id }}"
                            class="mb-3 font-bold text-blue-500 hover:underline">{{ $post->title }}
                        </a>
                        <div class="text-sm text-neutral-600">{{ $post->content }}</div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div>{{ $posts->links() }}</div>
</x-layout>
