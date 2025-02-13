<section>
    <header>

        
        
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->utilisateur->username)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Profile bio')" />
            <x-textarea id="bio" name="bio" class="mt-1 block w-full" :value="old('email', $user->utilisateur->bio)" />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div x-data="{ file: null }" data-aos="fade-in">
            <label for="profilePicture" class="block text-sm font-medium text-gray-700">{{ __('Profile Picture:') }}</label>
        
            <div class="dropzone border-2 border-dashed border-gray-400 rounded-md p-8 mt-2 text-center bg-white cursor-pointer"
                 x-on:click="document.getElementById('profilePictureInput').click()"
                 x-on:drop.prevent="file = $event.dataTransfer.files[0]"
                 x-on:dragover.prevent>
                
                <input type="file" name="profilePicture" id="profilePictureInput" class="hidden"
                       x-on:change="file = $event.target.files[0]" />
        
                <p x-show="!file" class="text-gray-500">{{ __("Drag 'n' drop a file here, or click to select one") }}</p>
                <p x-show="file" class="text-gray-500" x-text="file.name"></p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none transition ease-in-out duration-150">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</section>
