<div class="row">
    <div class="col-xl-4">
        <span class="login-user-title percentage-skeletone">{{ $title }}</span>
    </div>
    <div class="col-xl-6">
        <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped {{ $progressbarbg }} {{ $textPercentageProgress}} progress-bar-animated" 
                role="progressbar" 
                aria-valuenow="{{ round($percentage, 2) }}" 
                aria-valuemin="0" 
                aria-valuemax="100" 
                style="width: {{ round($percentage, 2) }}%;">
                <span>
                    <span class="number-rolling total-user-rolling" data-target="{{ round($percentage, 2) }}KB">{{ round($percentage) }}</span>
                    KB
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        @include('components.number-plate.number-badge')
    </div>
</div>