<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('フレンド') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('フレンドの新規登録・削除') }}
        </p>
    </header>

        <form action="{{ route('follow.register') }}" method="POST" class="mt-6">
            @csrf
            <div class="flex items-center">
                <x-text-input type="text" name="follow[email]" value="{{ old('follow.email') }}" placeholder="登録したいフレンドのメールアドレスを記入してください。" class="text-sm w-[400px]"/>
                <x-primary-button type="submit" class="ml-5">登録</x-primary-button>
            </div>
            @if(session('error'))
                <p class="pt-1 text-sm text-red-500">{{ session('error') }}</p>
            @endif
            @if(session('success'))
                <p class="pt-1 text-sm text-blue-500">{{ session('success') }}</p>
            @endif
        </form>

        <div class="pt-5">
            @foreach ($followings as $following)
                <div class="flex pt-2">
                    <p>{{ $following->name }}</p>
                    <p class="ml-5">{{ $following->email }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
