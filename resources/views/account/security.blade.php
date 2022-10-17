<div class="nav" id="myTab" role="tablist">

    <a class="c-tabs__link active" id="nav-security-tab" data-toggle="tab" href="#nav-security" role="tab"
       aria-controls="nav-security" aria-selected="false">Change Password</a>

</div>

<div class="u-pt-medium" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<div class="row">

    <div class="col-md-6">

        <form action="{{ route("security") }}" method="POST">
            @csrf
            @method("PUT")

            <div class="c-field u-mb-xsmall">
                <label class="c-field__label" for="user-email">Current Password</label>
                <x-input class="c-input" type="password" name="current_password" id="current_password" required/>
                @error("current_password")
                    <p class="u-text-danger">{{ $message }}</p>
                @enderror

                <label class="c-field__label" for="user-email">New password</label>
                <x-input class="c-input" type="password" name="password" id="password" required/>
                @error("password")
                    <p class="u-text-danger">{{ $message }}</p>
                @enderror

                <label class="c-field__label" for="user-email">Confirm new password</label>
                <x-input class="c-input" type="password" name="password_confirmation" id="password_confirmation" required/>
                @error("password_confirmation")
                    <p class="u-text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="u-mr-auto u-mb-xsmall">
                <button name="update_password" type="submit" class="c-btn c-btn--info c-btn--fullwidth">Update password</button>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <!-- Card -->
        <div class="card bg-light border ml-md-4">
            <div class="card-body">

                <!-- Text -->
                <p class="u-mb-xsmall">
                    Password requirements
                </p>
                <!-- Text -->
                <p class="u-text-small u-mb-xsmall">
                    To create a new password, you have to meet the following requirements:
                </p>
                <!-- List group -->
                <ul class="u-text-small u-mb-xsmall">
                    <li>
                        Minimum of 8 characters
                    </li>
                </ul>

            </div>
        </div>
    </div>


</div>
</div>
