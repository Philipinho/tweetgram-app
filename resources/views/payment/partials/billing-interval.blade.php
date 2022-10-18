
<!-- Body -->
<div class="list row justify-content-center btn-group-toggle radio_options" data-toggle="buttons">

        <div class="col-12 col-lg-4 col-sm-5">

            <!-- Card -->

            <label class="card btn-white btn" for="monthly_payment">

                <x-input type="radio"  id="monthly_payment" name="payment_interval" value="monthly" />

                <div class="card-body" style="padding: 0">

                    <!-- Body -->
                    <div class="text-center">

                        <!-- Heading -->
                        <h2 class="card-title">
                            Monthly Billing
                        </h2>

                        <!-- Text -->
                        <p class="small text-muted u-mb-small">
                            <span class="item-title">Billed monthly</span>
                        </p>
                    </div>
                </div>

            </label>
        </div>

    <div class="col-12 col-lg-4 col-sm-5">

        <!-- Card -->

        <label class="card btn-white btn" for="yearly_payment">

            <x-input type="radio"  id="yearly_payment" name="payment_interval" value="yearly"/>

            <div class="card-body" style="padding: 0">

                <!-- Body -->
                <div class="text-center">

                    <!-- Heading -->
                    <h2 class="card-title">
                        Yearly Billing
                    </h2>

                    <!-- Text -->
                    <p class="small text-muted u-mb-small">
                        <span class="item-title">Billed yearly</span>
                    </p>
                </div>
            </div>

        </label>
    </div>
</div>

