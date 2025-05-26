@props(['title',
    'count' => 0, 
    'progrssBarAnimationQuerySelector'=> '', 
    'progressbarbg'=>'', 
    'textPercentageProgress'=>'', 
    'numberCountAnimationKey'=>'', 
    'numberCountAnimation'=>'', 
    'percentage',
    'numberAmountClass',
    'badgeClass',
    'badgeRoundedClass',
    'progressbarbg',
    'textNumberClass',
])
<div class="row storage-row">
    <div class="col-xl-4">
        <span class="login-user-title percentage-skeletone">{{ $title }}</span>
    </div>
    <div class="col-xl-6">
        <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
            <div class="{{ $progrssBarAnimationQuerySelector }} progress-bar-striped {{ $progressbarbg }} {{ $textPercentageProgress}} progress-bar-animated" 
                role="progressbar" 
                aria-valuenow="{{ round($percentage, 2) }}" 
                aria-valuemin="0" 
                aria-valuemax="100" 
                style="width: {{ round($percentage, 2) }}%;">
                <span>
                    <span class="{{ $numberCountAnimationKey }} {{ $numberCountAnimation }}" data-target="{{ round($percentage, 2) }}B">{{ round($percentage) }}</span>
                    B
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 badge-position">
        @include('components.number-plate.number-badge', [
            'count' => $count,
            'numberAmountClass' => $numberAmountClass,
            'badgeClass' => $badgeClass,
            'badgeRoundedClass' => $badgeRoundedClass,
            'progressbarbg' => $progressbarbg,
            'textNumberClass' => $textNumberClass
        ])
    </div>
</div>