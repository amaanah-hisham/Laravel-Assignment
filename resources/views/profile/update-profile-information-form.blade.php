<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information.') }}
    </x-slot>

    <x-slot name="form">

        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>


        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " id="file-img" accept="image/*"/>

                <x-label for="photo" value="{{ __('Public Logo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="!photoPreview" >
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="150px" width="150px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" x-cloak="!photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="150px" height="150px">
                </div>

                <button class="btn btn-outline-secondary mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()" onclick="document.getElementById('file-img').click()" >
                    {{ __('Select A New Photo') }}
                </button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif


        <div >


                <!-- Name -->
                <div class="mb-3 form-group w-100">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <input type="text" id="name" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" wire:model.defer="state.name" autocomplete="name" value="{{ auth()->user()->name }}" />
                    <x-input-error for="name" />
                </div>

            <!-- Email -->
            <div class="mb-3 form-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" value="{{ auth()->user()->email }}" />
                <x-input-error for="email" />
            </div>

        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-button class="btn btn-dark">
                <div wire:loading class="spinner-border spinner-border-sm " role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Save') }}
            </x-button>
        </div>
    </x-slot>
</x-form-section>
