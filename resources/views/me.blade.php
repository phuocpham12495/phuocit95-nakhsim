<x-layout>
    <x-slot:title>Me</x-slot:title>
    <x-slot:heading>Me Page</x-slot:heading>
    <x-slot:description>Me Description</x-slot:description>



    <div class="mx-auto max-w-2xl lg:mx-0 m-5">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $person['name'] }}</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">{{ $person['university'] }}</p>
        <x-button href="/me/jobs/create">Create Job</x-button>
    </div>

    <div class="space-y-4">
        @foreach ($person['jobs'] as $job)
            <div class="block px-4 py-6 border border-gray-200 rounded-lg">
                <a href="me/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline"><strong>Job:
                        {{ $job['title'] }}</strong></a>
                <div class="font-bold">Company: {{ $job['company'] }}</div>
                <div class="text-sm">Co-worker: {{ $job->coWorker->name }}</div>
            </div>
        @endforeach
    </div>
    <div>{{ $person['jobs']->links() }}</div>
</x-layout>
