<!-- Header -->
<div class="header mt-md-1">
    <div class="header-body">
        <div class="row align-items-center">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                    Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    {{$site->title}}
                </h1>

            </div>
        </div> <!-- / .row -->

        <div class="row align-items-center">
            <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">

                  {{--  <li class="nav-item">
                        <a href="/payment/{{Request::route('id')}}" class="nav-link {{ Request::is('account') ? 'active' : '' }}">
                            General
                        </a>
                    </li>--}}

                    @if($site->status !=0)

                    <li class="nav-item">
                        <a href="/site/{{Request::route('id')}}/custom-domain" class="nav-link {{ Request::is('custom_domain') ? 'active' : '' }}">
                            Custom Domain
                        </a>
                    </li>

                    @endif

                    <li class="nav-item">
                        <a href="#subscription" class="nav-link {{ Request::is('subscription') ? 'active' : '' }}">
                            Subscription
                        </a>
                    </li>
                </ul>

            </div>
        </div>


    </div>
</div>
