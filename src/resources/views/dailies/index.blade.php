<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900">
                    @foreach ($dailies as $daily)
                        <div class="my-10">
                            <h1 class="inline text-2xl font-bold">{{ $daily->title }}</h1>
                            <span class="ml-10 text-sm">{{ $daily->user->name }}</span>
                            <p class="mt-2 text-base">{{ $daily->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
