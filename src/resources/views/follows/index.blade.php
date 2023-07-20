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
            <form action="{{ route('follow.register') }}" method="POST">
                @csrf
                <div class="flex items-center">
                    <input type="text" name="follow[email]" value="{{ old('follow.email') }}" placeholder="登録したいフレンドのメールアドレスを記入してください。" class="text-sm w-[400px]"/>
                    <x-primary-button type="submit" class="ml-5">登録</x-primary-button>
                </div>
                @if(session('error'))
                    <p class="pt-1 text-sm text-red-500">{{ session('error') }}</p>
                @endif
                @if(session('success'))
                    <p class="pt-1 text-sm text-blue-500">{{ session('success') }}</p>
                @endif
            </form>
        </div>

        <div class="pt-10">
            <h1 class="text-2xl font-bold">フレンド</h1>
            @foreach ($followings as $following)
                <div class="flex pt-2">
                    <p>{{ $following->name }}</p>
                    <p class="ml-5">{{ $following->email }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
