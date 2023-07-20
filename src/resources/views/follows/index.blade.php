<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div>
        <a href="{{ route('daily.index') }}">
            <x-primary-button type="button">ホームへ</x-primary-button>
        </a>

        <div class="pt-5">
            <h1 class="text-2xl font-bold">フレンド</h1>
            @foreach ($followings as $following)
                <p class="pt-2">{{ $following->name }}</p>
            @endforeach
        </div>
    </div>
</x-app-layout>
