@section('title', 'Login')
@include("partials/head")


{{--
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline u-text-small text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>

--}}

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">
          <span class="c-icon c-icon--large u-mb-small">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <!--<img src="img/logo-small.svg" alt="Neat">-->
          </span>

            <h4 class="u-mb-medium">Welcome Back :)</h4>

            <!-- Session Status -->
           {{-- <x-auth-session-status class="u-mb-small" :status="session('status')" />--}}

            <!-- Validation Errors -->
            <x-auth-validation-errors class="u-mb-small" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="c-field">
                    <x-label for="email" :value="__('Email')" class="c-field__label">{{__('Email Address')}}</x-label>
                    <x-input id="email" class="c-input u-mb-small" type="email" name="email" :value="old('email')" placeholder="e.g. adam@sandler.com" required autofocus />
                </div>

                <div class="c-field">
                    <x-label :value="__('Password')" class="c-field__label">Password</x-label>
                    <x-input class="c-input u-mb-small"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="form-check u-mb-small">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">

                    <label class="form-check-label text-gray-600" for="remember_me">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <x-button class="c-btn c-btn--fullwidth c-btn--info">
                    {{ __('Log in') }}
                </x-button>

            </form>
        </div>
    </div>
</div>
