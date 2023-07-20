<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            フレンド
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            フレンドの登録と削除ができます。
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
                <p
                    class="absolute bottom-[-24px] text-sm text-blue-600"
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
                <div class="flex items-center pt-2">
                    <form action="/follow/{{ $following->id }}" id="form_{{ $following->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            type="button"
                            onclick="deleteFollowing({{ $following->id }})"
                            class="px-2 py-1 text-sm bg-red-200 rounded-md hover:bg-red-300"
                        >
                            削除
                        </button>
                    </form>
                    <p class="ml-2">{{ $following->name }}</p>
                    <p class="ml-5">{{ $following->email }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function deleteFollowing(id){
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？ (物理削除)')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
