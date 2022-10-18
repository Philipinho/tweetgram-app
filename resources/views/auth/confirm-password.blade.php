@section('title', 'Confirm Password')
@include("partials/head")

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

         <span class="c-icon c-icon--large u-mb-small">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
             <!--<img src="img/logo-small.svg" alt="Neat">-->
          </span>
            <div class="u-mb-medium u-text-small">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="u-mb-small" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="c-field">
                <x-label class="c-field__label" for="password" :value="__('Password')" />

                <x-input class="c-input u-mb-small" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="c-field">
                <x-button class="c-btn c-btn--fullwidth c-btn--info">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
        </div>
    </div>
</div>

