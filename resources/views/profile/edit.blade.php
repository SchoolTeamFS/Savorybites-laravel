<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="profile-info">
                        <h2 class="text-lg font-medium text-[#B55D51]">Profile Information</h2>
                        <p class="my-2 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                        
                        <img 
                            src="{{ $user->utilisateur->image }}" 
                            alt="{{ $user->utilisateur->username ?? 'User' }}'s profile" 
                            class="rounded-full border-2 border-[#B55D51] max-w-[150px] h-[150px] mx-auto mb-4" />
                        
                        <p class="profile-text mt-2 ml-16 text-gray-700">Username: {{ $user->utilisateur->username ?? 'N/A' }}</p>
                        <p class="profile-text mt-2 ml-16 text-gray-700">Email: {{ $user->email ?? 'N/A' }}</p>
                        <p class="profile-text mt-2 ml-16 text-gray-700">Bio: {{ $user->utilisateur->bio ?? 'N/A' }}</p>
                    </div>
                    <div class=" mt-6 font-bold text-xl leading-tight ">
                        @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-red-600"
                            >{{ __('Profile updated successfully!') }}</p>
                        @endif
                    </div>
                    @include('profile.partials.update-profile-information-form')
                    <div class="p-4 m-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        @include('profile.partials.update-password-form')
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
