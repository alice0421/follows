<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Daily Edit') }}
        </h2>
    </x-slot>

    <form action="{{ route('daily.update', ['daily' => $daily->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-[600px] py-5 px-10 border border-gray-300 bg-white shadow rounded-md">
            <x-input-label for="daily_date" :value="__('日付')" />
            <x-text-input
                id="daily_date"
                name="daily[date]"
                type="date"
                value="{{ $daily->date }}"
                class="block mt-2 mb-5 text-base"
            />

            <x-input-label for="daily_title" :value="__('タイトル')" />
            <x-text-input
                id="daily_title"
                name="daily[title]"
                type="text"
                value="{{ $daily->title }}"
                class="block mt-2 mb-5 text-base w-[400px]"
            />

            <x-input-label for="daily_body" :value="__('本文')" class="mt-5" />
            <textarea
                id="daily_body"
                name="daily[body]"
                class="block mt-2 text-base resize-none w-[400px] h-[200px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >{{ $daily->body }}</textarea>
            
            <div class="flex items-center mt-4">
                <a href="{{ route('daily.show', ['daily' => $daily->id]) }}">
                    <x-primary-button type="button">キャンセル</x-primary-button>
                </a>
                <x-primary-button type="submit" class="ml-4">保存</x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
