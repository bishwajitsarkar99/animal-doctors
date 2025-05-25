<button type="button" class="btn btn-sm {{ $buttonParentClass }} {{ $buttonChildClass }}" id="{{ $buttonId }}">
    @include('components.buttons.button-loader')
    <span class="btn-text ms-1">{{ $label }}</span>
</button>