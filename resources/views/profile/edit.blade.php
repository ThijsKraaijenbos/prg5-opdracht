<x-layout pagename="Profile">
    <x-nav></x-nav>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="cc-2 m-5 bg-gray-800 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="cc-2 m-5 bg-gray-800 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="cc-2 m-5 bg-gray-800 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="cc-2 m-5 bg-gray-800 text-slate-50 p-5 border-[3px] border-slate-50 rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Your Cats
                        </h2>
                        @foreach ($cats as $cat)
                                <x-cat :cat="$cat" :list="true"></x-cat>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
