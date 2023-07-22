<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('My Daily') }}
        </h2>
    </x-slot>

    <!-- 自分の日記だけ表示 -->
    <div>
        @foreach ($dailies as $daily)
            <div class="pb-10">
                <a
                    href="{{ route('daily.show', ['daily' => $daily->id]) }}"
                    class="block w-60 truncate text-2xl text-blue-500 font-bold underline hover:no-underline"
                >
                    {{ $daily->title }}
                </a>

                <div class="flex pt-1 item-center text-gray-400 text-sm">
                    <p>{{ $daily->date->format('o/m/d') }}</p>
                    <p class="pl-5">{{ $daily->user->name }}</p>
                </div>
                
                <p class="pt-3 text-base w-80 h-10 truncate">{{ $daily->body }}</p>
                <form action="/daily/{{ $daily->id }}" id="form_{{ $daily->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="button" onclick="deleteDaily({{ $daily->id }})">
                        削除
                    </x-danger-button>
                </form>
            </div>
        @endforeach
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
