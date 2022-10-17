@section('title', 'Dashboard')

@include('partials.head')
@include("layouts.nav")

<body>
<div class="container" id="app">
    @include("components.flash")


    @if(!\App\Libs\Helpers::isSocialPresent())
        <div id="notification" class="c-alert c-alert--danger u-mb-xsmall">
         <span class="c-alert__icon">
         <i class="feather icon-slash"></i>
         </span>
                <div class="c-alert__content">
                    <h4 class="c-alert__title">Connect your profiles to get started</h4>
                    <p>You will have to log in with your social media profiles to complete your account setup.</p>
                </div>
                <div class="u-mt-small">
                    <a href="{{ route('instagram.redirect') }}" class="c-btn u-mb-xsmall"
                       style="background:#C3328C;"> <i class="feather icon-instagram"></i> Connect Instagram</a>
                </div>


                <div class="u-mt-small">
                    <a href="{{ route('twitter.redirect') }}" class="c-btn u-mb-xsmall"
                       style="background: #1bb1dc;"><i class="feather icon-twitter"></i> Connect Twitter</a>
                </div>


            </div>
    @else

    @if($status == 0 || $status == 1 || $status ==2)
        <div id="notification" class="c-alert @if($status == 1) c-alert--success @else c-alert--danger @endif u-mb-xsmall">

            @if($status == 1)
                <span class="c-alert__icon">
                    <i class="feather icon-circle"></i>
                </span>
                <div class="c-alert__content">
                    <h4 class="c-alert__title">Setup complete</h4>
                    <p>Nothing more to do. Your Instagram posts will be tweeted automatically.</p>
                </div>
            @else
                <span class="c-alert__icon">
                    <i class="feather icon-slash"></i>
                </span>
                <div class="c-alert__content">
                    <h4 class="c-alert__title">Connect your profiles to get started</h4>
                    <p>You will have to log in with your social media profiles to complete your account setup.</p>
                </div>
            @endif

            <div class="u-mt-small">
                @if(App\Libs\Helpers::isInstagramActive())
                <button class="c-btn u-mb-xsmall"
                        style="background:#C3328C;"> <i class="feather icon-instagram"></i> {{$insta_username}}</button>
                    <a href="{{ route('instagram.redirect') }}" data-toggle="tooltip" title="Reconnect account"
                       class="c-btn c-btn--danger btn-xsmall"><i class="feather icon-rotate-ccw"></i></a>
                @else
                    <a href="{{ route('instagram.redirect') }}" class="c-btn u-mb-xsmall"
                       style="background:#C3328C;"> <i class="feather icon-instagram"></i> Connect Instagram</a>
                @endif
            </div>

                <div class="u-mt-small">
                    @if(App\Libs\Helpers::isTwitterActive())
                    <button class="c-btn u-mb-xsmall"
                       style="background: #1bb1dc;"><i class="feather icon-twitter"></i> {{$tw_username}}</button>
                        <a href="{{ route('twitter.redirect') }}" data-toggle="tooltip" title="Reconnect account"
                           class="c-btn c-btn--danger btn-xsmall"><i class="feather icon-rotate-ccw"></i></a>
                    @else
                        <a href="{{ route('twitter.redirect') }}" class="c-btn u-mb-xsmall"
                           style="background: #1bb1dc;"><i class="feather icon-twitter"></i> Connect Twitter</a>
                    @endif
                </div>
        </div>
    @endif

    @if($plan == "Free")
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="c-card">
                    <h3 class="c-text--subtitle"><span class="c-icon c-icon--success u-mb-small mr-3">
                  <i class="feather icon-zap"></i>
                  </span> Subscription
                    </h3>
                    <h4><span style="font-size:16px;color:#111">Active plan:</span> {{ $plan }}</h4>
                    <br>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input data-id="auto_post" class="toggle-class c-switch__input"
                                   type="checkbox" {{ $auto_post ? 'checked' : '' }}>
                            <span class="c-switch__label">Auto Tweet</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>You can add <span style="color:blue">#tweetgram</span> hashtag to your Instagram caption to tweet
                            even when auto tweet is disabled.<br>The hashtag will not be included in the Tweet.</p>
                    </div>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input disabled data-id="remove_caption" class="c-switch__input" type="checkbox">
                            <span class="c-switch__label">Remove Tweetgram.me branding (Available on PRO)</span>
                        </label>
                    </div>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input disabled data-id="remove_hashtag" class="c-switch__input" type="checkbox">
                            <span class="c-switch__label">Remove Hashtags (Available on PRO)</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>Hashtags found on the Instagram caption will not be included in tweet.</p>
                    </div>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input disabled data-id="remove_caption" class="c-switch__input" type="checkbox">
                            <span class="c-switch__label">Remove Caption (Available on PRO)</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>Instagram caption will not be included in Tweet.</p>
                    </div>
                </div>
            </div>
            <div class=" u-mt-small">
                <a href="/upgrade" class="c-btn c-btn--success u-mb-xsmall">Upgrade To PRO</a>
            </div>
        </div>
    @elseif($plan == "Premium")
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="c-card">
                    <h4 class="c-text--subtitle"><span class="c-icon c-icon--success u-mb-small mr-3">
                  <i class="feather icon-zap"></i>
                  </span> Subscription
                    </h4>
                    <h3><span style="font-size:16px;color:#111">Active plan:</span> {{ $plan }}</h3>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input data-id="auto_post" class="toggle-class c-switch__input" type="checkbox"
                                   data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                   data-off="InActive" {{ $auto_post ? 'checked' : '' }}>
                            <span class="c-switch__label">Auto Tweet</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>You can add <font color="blue">#tweetgram</font> hashtag to your Instagram caption to tweet
                            even when auto tweet is disabled.<br>The hashtag will not be included on the Tweet.</p>
                    </div>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input data-id="remove_hashtags" class="toggle-class c-switch__input"
                                   type="checkbox" {{ $remove_hashtags ? 'checked' : '' }}>
                            <span class="c-switch__label">Remove Hashtags</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>Tweet will not include the hashtags on the Instagram post</p>
                    </div>
                    <div class="c-field u-mb-xsmall">
                        <label class="c-switch">
                            <input data-id="remove_caption" class="toggle-class c-switch__input"
                                   type="checkbox" {{ $remove_caption ? 'checked' : '' }}>
                            <span class="c-switch__label">Remove Caption</span>
                        </label>
                    </div>
                    <div class="c-note u-mb-medium">
                  <span class="c-note__icon">
                  <i class="feather icon-info"></i>
                  </span>
                        <p>Instagram caption will not be included in Tweet.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @endif
</div>

<script>
    $(function () {
        $('.toggle-class').change(function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var option = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'option': option},
                success: function (data) {
                }
            });
        })
    })
</script>

@include('partials.foot')
