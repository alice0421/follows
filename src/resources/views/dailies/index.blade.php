<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- 自分の日記 -->
        <div>
            @foreach ($my_dailies as $my_daily)
                <div class="pb-10">
                    <a
                        href="{{ route('daily.show', ['daily' => $my_daily->id]) }}"
                        class="block w-60 truncate text-2xl text-blue-500 font-bold underline hover:no-underline"
                    >
                        {{ $my_daily->title }}
                    </a>

                    <div class="flex pt-1 item-center text-gray-400 text-sm">
                        <p>{{ $my_daily->date }}</p>
                        <p class="pl-5">{{ $my_daily->user->name }}</p>
                    </div>
                    
                    <p class="pt-3 text-base w-80 h-10 truncate">{{ $my_daily->body }}</p>
                    <form action="/daily/{{ $my_daily->id }}" id="my_form_{{ $my_daily->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            type="button"
                            onclick="deleteDaily({{ $my_daily->id }})"
                            class="mt-1 px-2 py-1 text-sm bg-red-200 rounded-md hover:bg-red-300"
                        >
                            削除
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- フォローしているユーザー (フレンド) の日記 -->
        <div>
            @foreach ($following_dailies as $following_daily)
                <div class="pb-10">
                    <a
                        href="{{ route('daily.show', ['daily' => $following_daily->id]) }}"
                        class="block w-60 truncate text-2xl text-blue-500 font-bold underline hover:no-underline"
                    >
                        {{ $following_daily->title }}
                    </a>

                    <div class="flex pt-1 item-center text-gray-400 text-sm">
                        <p>{{ $following_daily->date }}</p>
                        <p class="pl-5">{{ $following_daily->user->name }}</p>
                    </div>
                    
                    <p class="pt-3 text-base w-80 h-10 truncate">{{ $following_daily->body }}</p>
                    <form action="/daily/{{ $following_daily->id }}" id="following_form_{{ $following_daily->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            type="button"
                            onclick="deleteDaily({{ $following_daily->id }})"
                            class="mt-1 px-2 py-1 text-sm bg-red-200 rounded-md hover:bg-red-300"
                        >
                            削除
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    function deleteDaily(id){
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？ (物理削除)')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
