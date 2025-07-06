<button type="{{ $btnType }}" class="btn btn-sm {{ $buttonParentClass }} {{ $buttonSkeletone }}" id="{{ $buttonId }}">
    @include('components.Buttons.ButtonLoader')
    <span class="btn-text ms-1">{{ $label }}</span>
</button>