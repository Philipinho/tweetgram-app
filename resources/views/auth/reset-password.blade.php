@section('title', 'Reset Password')
@include("partials/head")

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

         <span class="c-icon c-icon--large u-mb-small">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
             <!--<img src="img/logo-small.svg" alt="Neat">-->
          </span>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="u-mb-small" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="c-field">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="c-input u-mb-small" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="c-field">
                <x-label class="c-field__label" for="password" :value="__('Password')" />

                <x-input class="c-input u-mb-small" id="password" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="c-field">
                <x-label class="c-field__label" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input class="c-input u-mb-small" id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="c-field">
                <x-button class="c-btn c-btn--fullwidth c-btn--info">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
        </div>
    </div>
</div>
