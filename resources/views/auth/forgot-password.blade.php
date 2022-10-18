@section('title', 'Forgot Password')
@include("partials/head")

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

         <span class="c-icon c-icon--large u-mb-small">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
             <!--<img src="img/logo-small.svg" alt="Neat">-->
          </span>

        <div class="u-mb-medium u-text-small">
            {{ __('Enter your email to get a password reset link.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="u-mb-small" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="u-mb-small" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="c-field">
                <x-label class="c-field__label" for="email" :value="__('Email')" />

                <x-input id="email" class="c-input u-mb-small" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="c-field">
                <x-button class="c-btn c-btn--fullwidth c-btn--info">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
        </div>
    </div>
</div>
