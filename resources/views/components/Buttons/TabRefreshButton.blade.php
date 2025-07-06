<button type="button" class="btn btn-sm {{ $buttonParentClass }} {{ $buttonChildClass }}" id="{{ $buttonId }}">
    @include('components.Buttons.ButtonLoader')
    <span class="btn-text ms-1">{{ $label }}</span>
</button>