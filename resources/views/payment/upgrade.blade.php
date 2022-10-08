@section('title', 'Upgrade')

@include('partials.head')
@include("layouts.nav")

<body>

<div class="container" id="app">

    <div class="row u-mb-xlarge u-mt-large">

        <div class="col-md-4 offset-md-3">
            <div class="c-plan">

                <h3 class=""><span class="c-plan__icon c-icon c-icon--success c-icon--small u-mr-small">
							<i class="feather icon-check-square"></i>
						</span>Become a PRO User!</h3>
                <h6 class="u-mb-small">PLAN</h6>

                <div class="c-choice c-choice--radio">
                    <input class="c-choice__input" id="radio1" name="plan" value="{{env('PADDLE_YEARLY_PLAN')}}" checked type="radio">
                    <label class="c-choice__label" for="radio1">$70 / year
                        <div style="color:maroon">(save $26)</div>
                    </label>
                </div>

                <div class="c-choice c-choice--radio u-mb-small">
                    <input class="c-choice__input" id="radio2" name="plan" value="{{env('PADDLE_MONTHLY_PLAN')}}" type="radio">
                    <label class="c-choice__label" for="radio2">$8 / month</label>
                </div>

                <ul class="c-plan__list">
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Auto Tweet</li>
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Carousel
                        (Multi-Photos)
                    </li>
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Remove Hashtags
                    </li>
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Remove
                        TweetGram Branding
                    </li>
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Remove Caption
                    </li>
                    <li class="c-plan__list-item"><i style="color:green" class="feather icon-check"></i> Priority
                        Support
                    </li>
                </ul>

                <button type="button" style="font-weight: bold" class="c-btn c-btn--success c-btn--fullwidth js-buy" id="buy">
                    Subscribe
                </button>
            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    function checkoutClosed(data) {
        alert("Payment was not completed.")
    }

    function checkoutComplete(data) {
        $("#successModel").modal('show');

        const redirect_url = "/payment/checkout/" + data.checkout.id;

        $(document).ready(function () {
            window.setTimeout(function () {
                window.location.replace(redirect_url);
            }, 4000);
        });
    }

    const openCheckout = () => {
        Paddle.Checkout.open({
            product: document.querySelector('.c-choice__input:checked').value,
            passthrough: {{Auth::id()}},
            email: '{{Auth::user()->email}}',
            closeCallback: "checkoutClosed",
            successCallback: "checkoutComplete",
        });
    }

    document.querySelector("#buy").addEventListener("click", openCheckout);
</script>

@paddle

@include("payment.modal")
@include('partials.foot')
