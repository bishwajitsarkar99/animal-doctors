<button type="{{ $btnType }}" class="btn btn-sm {{ $buttonParentClass }} {{ $buttonSkeletone }}" id="{{ $buttonId }}">
    @include('components.buttons.button-loader')
    <span class="btn-text ms-1">{{ $label }}</span>
</button>