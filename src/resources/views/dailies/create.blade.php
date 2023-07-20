<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily Create') }}
        </h2>
    </x-slot>

    <div>
        <a href="{{ route('daily.index') }}"
        class="inline text-base text-blue-500 font-bold underline hover:no-underline"
        >
            <x-primary-button type="button">ホームへ</x-primary-button>
        </a>

        <form action="{{ route('daily.store') }}" method="POST">
            @csrf
            <div class="w-[600px] my-5 py-5 px-10 border border-gray-300 rounded-md">
                <x-input-label for="daily_date" :value="__('日付')" />
                <x-text-input id="daily_date" type="date" class="block mt-2 mb-5 text-base" name="daily[date]"/>

                <x-input-label for="daily_title" :value="__('タイトル')" />
                <x-text-input id="daily_title" type="text" class="block mt-2 mb-5 text-base w-[400px]" name="daily[title]"/>

                <x-input-label for="daily_body" :value="__('本文')" class="mt-5" />
                <textarea id="daily_body" name="daily[body]" class="block mt-2 text-base resize-none w-[400px] h-[200px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                
                <x-primary-button type="submit" class="mt-5">作成</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
