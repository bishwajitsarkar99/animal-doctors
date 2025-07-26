<div class="{{ $menuParentClass }}">
    <a id="{{ $menuId }}">
        <span class="{{ $showIdClassName }} {{ $activeMenu }}">
            <strong>{{ $menuName }}</strong>
        </span>
        {{ $menuIcon }}
    </a>
    <div class="{{ $menuChildClass}}" id="{{ $wrapperId }}">
        <div class="card-width-resizer right-resizer"></div>
        <div class="card-width-resizer left-resizer"></div>
        <div class="card-height-resizer bottom-resizer"></div>
        <div class="card-height-resizer top-resizer"></div>
        <svg class="connector" width="100%" height="100%">
            <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
        </svg>
        {{$slot}}
    </div>
</div>