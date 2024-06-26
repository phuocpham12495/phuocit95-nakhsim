<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/">
                        <img class="h-8 w-8 inline-block" src="/img/logo.png" alt="Your Company">
                        <span class="text-white rounded-md px-2 py-2 text-sm font-medium">PhuocIt95</span>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" active="{{ request()->is('/') }}" type="a">Home</x-nav-link>

                        @auth
                            <x-nav-link href="/bibleverses" active="{{ request()->is('bibleverses') }}" type="a">Bible
                                Verse</x-nav-link>
                            <x-nav-link href="/posts" active="{{ request()->is('posts') }}"
                                type="a">Post</x-nav-link>
                            <x-nav-link href="/football" active="{{ request()->is('football') }}"
                                type="a">Football</x-nav-link>
                        @endauth

                        {{-- <x-nav-link href="/about" active="{{ request()->is("about") }}"
                            type="a">About</x-nav-link> --}}
                        {{-- <x-nav-link href="/contact" active="{{ request()->is("contact") }}"
                            type="a">Contact</x-nav-link> --}}
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                @auth
                    <div class="ml-4 flex items-center md:ml-6">
                        {{-- <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button> --}}

                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button x-on:click="open = !open" type="button"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="/img/sample-avatar.svg" alt="">
                                    <div class="text-white rounded-md px-3 py-2 text-sm font-medium">
                                        {{ Auth::user()->name }}</div>
                                </button>
                            </div>
                            <div x-show="open" @click.outside="open = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1">Your Profile</a>
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1">Settings</a> --}}
                            </div>
                        </div>
                        <div class="ml-10 flex items-baseline space-x-4">
                            <form method="POST" action="/logout">
                                @csrf
                                <x-form-button>Log Out</x-form-button>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/login" active="{{ request()->is('login') }}" type="a">Log
                            In</x-nav-link>
                        <x-nav-link href="/register" active="{{ request()->is('register') }}"
                            type="a">Register</x-nav-link>
                    </div>
                @endguest
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button x-on:click="open = !open" type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="open ?"hidden" : "block"" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d=" M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="!open ?"hidden" : "block"" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d=" M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden">
        <div x-show="open" @click.outside="open = false" class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link-mobile href="/" active="{{ request()->is('/') }}">Home</x-nav-link-mobile>
            @auth
                <x-nav-link-mobile href="/bibleverses" active="{{ request()->is('bibleverses') }}">Bible
                    Verse</x-nav-link-mobile>
                <x-nav-link-mobile href="/posts" active="{{ request()->is('posts') }}">Post</x-nav-link-mobile>
                <x-nav-link-mobile href="/football" active="{{ request()->is('football') }}">Football</x-nav-link-mobile>
            @endauth
            {{-- <x-nav-link-mobile href="/about" active="{{ request()->is("about") }}">About</x-nav-link-mobile> --}}
            {{-- <x-nav-link-mobile href="/contact" active="{{ request()->is("contact") }}">Contact</x-nav-link-mobile> --}}
            @guest
                <x-nav-link-mobile href="/login" active="{{ request()->is('login') }}">Log In</x-nav-link-mobile>
                <x-nav-link-mobile href="/register" active="{{ request()->is('register') }}">Register</x-nav-link-mobile>
            @endguest
        </div>
        @auth
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full" src="/img/sample-avatar.svg" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    {{-- <button type="button"
                        class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button> --}}
                </div>
                @auth
                    <div class="mt-3 space-y-1 px-2">
                        <a href="/profile"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                            Profile</a>
                        {{-- <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a> --}}
                        <form method="POST" action="/logout">
                            @csrf
                            <x-form-button>Log Out</x-form-button>
                        </form>
                    </div>
                @endauth

            </div>
        @endauth
    </div>
</nav>
