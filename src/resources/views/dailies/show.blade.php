<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily Detail') }}
        </h2>
    </x-slot>

    <div>
        <div class="pb-10">
            <h1 class="inline text-2xl font-bold">{{ $daily->title }}</h1>
            <span class="pl-10 text-sm">{{ $daily->user->name }}</span>
            <p class="pt-2 text-base">{{ $daily->body }}</p>
        </div>

        <a href="{{ route('daily.index') }}"
        class="inline text-base text-blue-500 font-bold underline hover:no-underline"
        >
            ホームへ
        </a>
    </div>
</x-app-layout>
