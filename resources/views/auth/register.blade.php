<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-3" />

        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/imgs/logo/logo2.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <x-label value="{{ __('Name') }}" />

                    <x-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                 :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error for="name"></x-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Email') }}" />

                    <x-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email')" required />
                    <x-input-error for="email"></x-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Address') }}" />

                    <x-input class="{{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address"
                             :value="old('address')" required />
                    <x-input-error for="address"></x-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Mobile') }}" />

                    <x-input class="{{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile"
                             :value="old('mobile')" required />
                    <x-input-error for="mobile"></x-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Password') }}" />

                    <x-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-input-error for="password"></x-input-error>
                </div>

                <div class="mb-3">
                    <x-label value="{{ __('Confirm Password') }}" />

                    <x-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button>
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

    </x-authentication-card>
    </div>
</x-guest-layout>
