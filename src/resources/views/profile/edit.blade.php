<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex w-full">
        <div class="w-1/2">
            <div class="p-8 border border-gray-300 bg-white shadow rounded-md">
                <div class="w-4/5">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="mt-6 p-8 border border-gray-300 bg-white shadow rounded-md">
                <div class="w-4/5">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="mt-6 p-8 border border-gray-300 bg-white shadow rounded-md">
                <div class="w-4/5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

        <div class="ml-3 w-1/2">
            <div class="p-8 border border-gray-300 bg-white shadow rounded-md">
                @include('profile.partials.follow-users')
            </div>
        </div>
    </div>
</x-app-layout>
