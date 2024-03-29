@section('title', 'Register')
@include("partials/head")

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">
          <span class="c-icon c-icon--large u-mb-small">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <!--  <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
<!--            <img src="img/logo-small.svg" alt="Neat">-->
          </span>

            <h4 class="u-mb-medium">Sign up</h4>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="u-mb-small" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="c-field">
                    <x-label for="email" :value="__('Email')" class="c-field__label">Email Address</x-label>
                    <x-input id="email" class="c-input u-mb-small"
                           type="email"
                           name="email" :value="old('email')" placeholder="e.g. adam@sandler.com" required />
                </div>

                <div class="c-field u-mb-small">
                    <x-label for="password" :value="__('Password')" class="c-field__label">Password</x-label>

                    <x-input id="password" class="c-input"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>

                <x-button class="c-btn c-btn--fullwidth c-btn--info">
                    {{ __('Register') }}
                </x-button>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline u-text-small text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                </div>

            </form>
        </div>
    </div>
</div>
