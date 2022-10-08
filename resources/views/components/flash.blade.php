{{--@if(!Auth::user()->email_verified_at)
<div class="alert alert-danger-light mt-3">
    Please verify your email <a href="/verify-email">Click here</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
--}}

@if (flash()->message)
    <div class="col-md-6">
        <div class="c-alert {{ flash()->class }} u-mb-medium">
		<span class="c-alert__icon">
            @if(flash()->level === 'success')
                <i class="feather icon-check"></i>
            @elseif(flash()->level == 'info')
                <i class="feather icon-info"></i>

            @elseif(flash()->level == 'warning')
                <i class="feather icon-alert-triangle"></i>
            @elseif(flash()->level == 'danger')
                <i class="feather icon-slash"></i>
            @endif
		</span>
            <div class="c-alert__content">
                <h4 class="c-alert__title">{{ flash()->message }}</h4>
               {{-- <p>{{ flash()->message }}</p> --}}
            </div>
            <button class="c-close" data-dismiss="alert" type="button">×</button>
        </div>
    </div>
@endif
