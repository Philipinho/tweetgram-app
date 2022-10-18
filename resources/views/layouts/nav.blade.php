<script>
    function imgError(image) {
        image.onerror = "";
        image.src = "{{URL::asset('neat/assets/images/blank-avatar.png')}}";
        return true;
    }
</script>

<body>

<div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar">
            <div class="c-sidebar__brand">
                <a href="#">
                    <!-- <img src="{{URL::asset('neat/assets/images/logo/logo-2.png') }}" alt="TweetGram"
							style="width:120px;height:80px"> -->
                    TweetGram
                </a>
            </div>

            <!-- Scrollable -->
            <div class="c-sidebar__body">
                <span class="c-sidebar__title">MENU</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link is-active" href="{{ route("dashboard")  }}">
                            <i class="c-sidebar__icon feather icon-home"></i>Dashboard
                        </a>
                    </li>

                    <li>
                        <a class="c-sidebar__link" href="{{ route("invoice")  }}">
                            <i class="c-sidebar__icon feather icon-activity"></i>Invoice
                        </a>
                    </li>

                    @if(!\App\Libs\Helpers::isPremium())
                        <li>
                            <a class="c-sidebar__link" href="{{ route("upgrade")  }}">
                                <i class="c-sidebar__icon feather icon-anchor"></i>Upgrade
                            </a>
                        </li>
                    @endif

                    @if(\App\Libs\Helpers::isPremium())
                        <li>
                            <a class="c-sidebar__link" href="{{ \App\Libs\Helpers::getSubCancelUrl() }}"
                               target="_blank" onclick="cancelSub()">
                                <i class="c-sidebar__icon feather icon-x-square"></i>Cancel Subscription
                            </a>
                        </li>
                    @endif


                </ul>

                <span class="c-sidebar__title">MENU</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="/">
                            <i class="c-sidebar__icon feather icon-home"></i>Home
                        </a>
                    </li>

                    <li>
                        <a class="c-sidebar__link" href="{{ route("account")  }}">
                            <i class="c-sidebar__icon feather icon-users"></i>Account
                        </a>
                    </li>

                    <li>
                        <a class="c-sidebar__link" href="/#faq">
                            <i class="c-sidebar__icon feather icon-file-text"></i>FAQ
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="{{ route("terms")  }}">
                            <i class="c-sidebar__icon feather icon-book"></i>T.O.S
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="{{ route("privacy")  }}">
                            <i class="c-sidebar__icon feather icon-anchor"></i>Privacy
                        </a>
                    </li>
                </ul>

            </div>


            <a class="c-sidebar__footer" href="{{ route("logout")  }}" >
                Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
            </a>
        </aside>
    </div>

    <main class="o-page__content">
        <header class="c-navbar u-mb-medium" id="head">
            <button class="c-sidebar-toggle js-sidebar-toggle">
                <i class="feather icon-align-left"></i>
            </button>

            <h2 class="c-navbar__title">
                @yield('title')
            </h2>


            <p class="u-mr-medium "><span class="u-hidden-down@mobile">Hello,
						<strong>{{ Auth::user()->name }}</strong></span>
                <strong><span class="u-color-danger "></span></strong></p>
            <div class="c-dropdown dropdown">
                <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <img class="c-avatar__img" onerror="imgError(this);" src="{{ Auth::user()->getGravatar() }}">
                </div>

                <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right"
                     aria-labelledby="dropdownMenuAvatar">
                    <a class="c-dropdown__item dropdown-item" href="{{ route("account")  }}">Account</a>
                    <a class="c-dropdown__item dropdown-item" href="{{ route("logout")  }}">Log out</a>
                </div>
            </div>
        </header>
