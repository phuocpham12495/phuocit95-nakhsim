<x-layout>
    <x-slot:title>Post Detail</x-slot:title>
    <x-slot:heading>Post Detail</x-slot:heading>
    <x-slot:description>A post detail</x-slot:description>

    <!-- component -->
    <div class="flex items-center justify-center">
        <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white mb-4">
            <div class="flex w-full items-center justify-between border-b pb-3">
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 sm:w-10 sm:h-10 rounded-full" src="/img/sample-avatar.svg" alt="">
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
                <div class="mb-3 text-xl font-bold">{{ $post->title }}
                </div>
                <div class="text-sm text-neutral-600">{{ $post->content }}</div>
            </div>

            <div>
                <div class="flex items-center justify-between text-slate-500">
                    <div class="flex space-x-4 md:space-x-8">
                        <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span>{{ $post->comments->count() }}</span>
                        </div>
                        <livewire:like />
                    </div>
                </div>
            </div>
            <ul>
                @foreach ($post->comments as $comment)
                    <li class="flex mt-4 mb-6">
                        <div class="flex-shrink-0 mr-3">
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-8 sm:h-8" src="/img/sample-avatar.svg"
                                alt="">
                        </div>
                        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong>{{ $comment->user->name }}</strong> <span
                                class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($comment->created_at)->format('d-m-Y') }}</span>
                            <p class="text-sm">
                                {{ $comment->content }}
                            </p>

                            <form method="POST" action="/comments/{{ $comment->id }}">
                                @csrf
                                @method('DELETE')
                                <div class="buttons flex justify-end gap-x-2">
                                    <x-form-button>Delete</x-form-button>
                                </div>
                            </form>
                            {{--
                            <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>

                            <div class="space-y-4">
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="mt-3 rounded-full w-6 h-6 sm:w-6 sm:h-6"
                                            src="/img/sample-avatar.svg" alt="">
                                    </div>
                                    <div
                                        class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                        <p class="text-xs sm:text-sm">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                            sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua.
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </li>
                @endforeach
            </ul>
            @auth
                <form action="/comments" method="POST">
                    @csrf
                    <div class="mt-2 editor mx-auto flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg">
                        <textarea id="content" name="content"
                            class="mb-2 description bg-gray-100 sec p-3 h-30 border border-gray-300 outline-none" spellcheck="false"
                            placeholder="Comment here"></textarea>
                        <input id="postId" name="postId" type="hidden" value="{{ $post->id }}" />

                        <!-- icons -->
                        {{-- <div class="icons flex text-gray-500 m-2">
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
                    </div> --}}
                        <!-- buttons -->
                        <div class="buttons flex justify-end gap-x-2">
                            <x-form-button>Comment</x-form-button>
                        </div>
                    </div>
                </form>
            @endauth
        </div>
    </div>

    <div class="buttons flex justify-end gap-x-2">
        <x-form-button form="form-delete">Delete</x-form-button>
    </div>
    <form method="POST" action="/posts/{{ $post->id }}" class="hidden" id="form-delete">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
