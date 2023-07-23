<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Search Result') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div>
            <h1 class="pb-2 text-2xl font-bold text-gray-900">日記</h1>
            @if(!$dailies->isEmpty())
                @foreach ($dailies as $daily)
                    <div class="pb-10">
                        <a
                            href="{{ route('daily.show', ['daily' => $daily->id]) }}"
                            class="block w-60 truncate text-2xl text-blue-600 font-bold underline hover:no-underline"
                        >
                            {{ $daily->title }}
                        </a>

                        <div class="flex pt-1 item-center text-gray-400 text-sm">
                            <p>{{ $daily->date->format('o/m/d') }}</p>
                            <a
                                href="{{ route('daily.index', $daily->user->id) }}"
                                class="text-blue-400 underline hover:no-underline"
                            >
                                <p class="pl-5">{{ $daily->user->name }}</p>
                            </a>
                        </div>
                        
                        <p class="pt-3 text-base w-80 h-10 truncate">{{ $daily->body }}</p>
                    </div>
                @endforeach
            @else
                <p>検索に該当する日記はありません。</p>
            @endif
        </div>

        <div class="ml-20">
            <h1 class="pb-2 text-2xl font-bold text-gray-900">アカウント</h1>
            @if(!$users->isEmpty())
                @foreach ($users as $user)
                    <a
                        href="{{ route('daily.index', $user->id) }}"
                        class="block mb-4 w-60 truncate text-base text-blue-500 font-bold underline hover:no-underline"
                    >
                        <p>{{ $user->name }}</p>
                    </a>
                @endforeach
            @else
                <p>検索に該当するアカウントはいません。</p>
            @endif
        </div>
    </div>
</x-app-layout>
