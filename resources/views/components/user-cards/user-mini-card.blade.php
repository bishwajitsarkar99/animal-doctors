@props(['title', 'count', 'percentage', 'cardClass'=> '', 'iconColor'=> '', 'loaderClass'=> '', 'numberCountAnimationKey'=> '', 'numberCountAnimation'=> '', 'progrssBarAnimationQuerySelector'=> '', 'progressColor'=> '', 'cardId'=> '', 'drag'=> ''])
<div class="card card-body group-card {{ $cardClass }}" draggable="{{ $drag }}" id="{{ $cardId }}">
    <div class="card card-head-title mini-card-title align-items-center justify-content-center">
        <span class="align-items-left justify-content-left head-skeletone">
            <i class="fa-solid fa-layer-group" style="color:{{ $iconColor }};"></i>
            {{ $title }}
        </span>
        <div class="pb-1">
            <div class="ring-container cricale-number-skeleton">
                <div class="outer-ring"></div>
                <div class="inner-ring"> </div>
                <div class="{{ $loaderClass }}" style="--percentage: 76;">
                    <span>
                        <span class="total-number {{ $numberCountAnimationKey }} {{ $numberCountAnimation }}" data-target="{{ round($percentage) }}">{{ round($percentage) }}</span>
                        <span class="percentage-size">%</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="--count_box">
        <span class="count-number percentage-skeletone">
            Count-Number :
            <span class="{{ $numberCountAnimationKey }} {{ $numberCountAnimation }}" data-target="{{ $count }}">{{ $count }}</span>
        </span>
    </div>
</div>