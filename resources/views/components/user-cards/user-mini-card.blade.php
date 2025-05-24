<div class="card card-body {{ $cardClass }}">
    <div class="card card-head-title mini-card-title align-items-center justify-content-center">
        <span class="align-items-left justify-content-left head-skeletone">
            <i class="fa-solid fa-layer-group" style="color:{{ $iconColor }};"></i>
            {{ $title }}
        </span>
        <div class="ring-div">
            <div class="{{ $loaderClass }} cricale-number-skeleton">
                <span class="total-number number-rolling total-user-rolling" data-target="{{ $count }}">{{ $count }}</span>
            </div>
        </div>
    </div>
    <div class="progress percentage-skeletone" style="height:0.7rem;">
        <div class="progress-bar progress-bar-striped {{ $progressColor ?? '' }} progress-bar-animated" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percentage }}%;">
            <span>
                <span class="number-rolling total-user-rolling" data-target="{{ round($percentage, 2) }}%">{{ round($percentage, 2) }}</span>
                %
            </span>
        </div>
    </div>
</div>