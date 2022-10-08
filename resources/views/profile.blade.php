@include('partials.head')
@include("layouts.nav")

<div class="container">
    @include("components.flash")

    <div class="row">
        <div class="col-md-7">
            <div class="c-alert c-alert--info u-mb-medium">
				<span class="c-alert__icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check">
						<polyline points="20 6 9 17 4 12"></polyline>
					</svg>
				</span>

                <div class="c-alert__content">
                    <h4 class="c-alert__title">Heads Up, {{ auth()->user()->name }} :)</h4>
                    <p>Contact us at hello@tweetgram.me if you have any questions.</p>
                </div>
            </div><!-- // .c-alert -->

            <nav class="c-tabs">
                <div class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">

                    <a class="c-tabs__link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Edit profile</a>

                </div>

                <div class="c-tabs__content tab-content" id="nav-tabContent">

                    <div class="c-tabs__pane active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="{{ route("profile") }}" method="POST">
                                    @csrf
                                    @method("PUT")

                                    <div class="c-field u-mb-xsmall">
                                        <label class="c-field__label" for="user-email">Name</label>
                                        <x-input class="c-input" type="text" name="name" id="name"
                                                 value="{{ auth()->user()->name }}" required/>
                                        @error("name")
                                          <p class="u-text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="c-field u-mb-xsmall">
                                        <label class="c-field__label" for="user-email">Email Address</label>

                                        <x-input class="c-input" name="email" type="email"
                                                 value="{{ auth()->user()->email }}" />

                                        @error("email")
                                        <p class="u-text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="u-mr-auto u-mb-xsmall">
                                        <button name="update_info" type="submit" class="c-btn c-btn--info c-btn--fullwidth">Save Settings</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-5">
            <div class="c-card">
                <div class="u-text-center">
                    <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                        <img class="c-avatar__img" src=" " alt="Avatar">
                    </div>

                    <h5>{{ auth()->user()->name }}</h5>
                    {{--<p>{{$plan}} Subscription</p>--}}
                </div>

                <span class="c-divider u-mv-small"></span>

                <span class="c-text--subtitle">Email Address</span>
                <p class="u-mb-small u-text-large">{{ auth()->user()->email }}</p>

                <span class="c-text--subtitle">Username</span>

                <p class="u-mb-small u-text-large">{{ auth()->user()->name }}</p>

                <p class="u-h4 u-text-center">
                    <a class="u-mr-xsmall" href="https://instagram.com/">
                        <i class="feather icon-instagram"></i>
                    </a>
                    <a class="u-mr-xsmall" href="https://twitter.com/">
                        <i class="feather icon-twitter"></i>
                    </a>
                </p>
            </div>
        </div>

    </div>
</div>

@include('partials.foot')
