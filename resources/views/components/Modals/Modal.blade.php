<div class="{{ $modalParentClass }}" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="{{ $modalChildClass }}">
        {{ $slot }}
    </div>
</div>