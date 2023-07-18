<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div>
        @foreach ($dailies as $daily)
            <div class="pb-10">
                <a href="{{ route('daily.show', ['daily' => $daily->id]) }}"
                class="inline text-2xl text-blue-500 font-bold underline hover:no-underline"
                >
                    {{ $daily->title }}
                </a>
                <span class="pl-10 text-sm">{{ $daily->user->name }}</span>
                <p class="pt-3 text-base">{{ $daily->body }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
