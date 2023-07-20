<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            フレンド
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            フレンドの新規登録・削除
        </p>
    </header>

        <form action="{{ route('follow.register') }}" method="POST" class="relative mt-6">
            @csrf
            <div class="flex items-center">
                <x-text-input type="text" name="follow[email]" value="{{ old('follow.email') }}" placeholder="登録したいフレンドのメールアドレスを記入してください。" class="text-sm w-[400px]"/>
                <x-primary-button type="submit" class="ml-5">登録</x-primary-button>
            </div>
            @if(session('error'))
                <p class="absolute bottom-[-24px] text-sm text-red-600">
                    {{ session('error') }}
                </p>
            @endif   
            @if(session('success'))
                <p class="absolute bottom-[-24px] text-sm text-blue-600"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                    {{ session('success') }}
                </p>
            @endif
        </form>

        <div class="pt-6">
            @foreach ($followings as $following)
                <div class="flex pt-2">
                    <p>{{ $following->name }}</p>
                    <p class="ml-5">{{ $following->email }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
