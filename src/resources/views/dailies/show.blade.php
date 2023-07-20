<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily Detail') }}
        </h2>
    </x-slot>

    <div class="w-[600px] py-5 pb-10">
        <h1 class="text-2xl font-bold">
            {{ $daily->title }}
        </h1>
        <div class="flex pt-1 item-center text-gray-400 text-sm">
            <p>{{ $daily->date }}</p>
            <p class="pl-5">{{ $daily->user->name }}</p>
        </div>
        <p class="pt-5 text-lg">{{ $daily->body }}</p>

        <a href="{{ route('daily.edit', ['daily' => $daily->id]) }}">
            <x-primary-button type="button" class="mt-4">編集</x-primary-button>
        </a>
    </div>
</x-app-layout>
