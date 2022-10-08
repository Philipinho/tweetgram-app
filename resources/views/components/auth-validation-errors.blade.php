@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <!--   <div class="text-danger">
            {{-- __('Whoops! Something went wrong.') --}}
        </div>-->

        <ul class="u-mt-small u-text-small list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item u-text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
