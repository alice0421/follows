<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily') }}
        </h2>
    </x-slot>

    <div>
        <a href="{{ route('daily.create') }}">
            <x-primary-button type="button">新規作成</x-primary-button>
        </a>

        <div class="pt-5">
            @foreach ($dailies as $daily)
                <div class="pb-10">
                    <a href="{{ route('daily.show', ['daily' => $daily->id]) }}"
                    class="block w-60 truncate text-2xl text-blue-500 font-bold underline hover:no-underline"
                    >
                        {{ $daily->title }}
                    </a>

                    <div class="flex pt-1 item-center text-gray-400 text-sm">
                        <p>{{ $daily->date }}</p>
                        <p class="pl-5">{{ $daily->user->name }}</p>
                    </div>
                    
                    <p class="pt-3 text-base w-80 h-10 truncate">{{ $daily->body }}</p>
                    <form action="/daily/{{ $daily->id }}" id="form_{{ $daily->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteDaily({{ $daily->id }})" class="mt-1 px-2 py-1 text-sm bg-red-200 rounded-md hover:bg-red-300">
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
