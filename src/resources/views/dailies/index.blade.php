<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div>
        @foreach ($dailies as $daily)
            <div class="pb-10">
                <h1 class="inline text-2xl font-bold">{{ $daily->title }}</h1>
                <span class="pl-10 text-sm">{{ $daily->user->name }}</span>
                <p class="pt-3 text-base">{{ $daily->body }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
