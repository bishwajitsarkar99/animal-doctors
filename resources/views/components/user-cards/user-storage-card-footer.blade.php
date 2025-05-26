<div class="row">
    <div class="col-xl-4">
        <span class="login-user-title percentage-skeletone">{{ $title }}</span>
    </div>
    <div class="col-xl-6">
        <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
            <div class="{{$progrssQuerySelector}} progress-bar-striped {{ $progressbarbg }} {{ $textPercentageProgress}} progress-bar-animated" 
                role="progressbar" 
                aria-valuenow="{{ round($percentage) }}" 
                aria-valuemin="0" 
                aria-valuemax="100" 
                style="width: {{ round($percentage) }}KB;">
                <span>
                    <span class="number-rolling total-user-rolling" data-target="{{ round($percentage) }}KB">{{ round($percentage) }}</span>
                    KB out of {{$storageCapacity}}MB
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-2 badge-position">
        <span>
            <span class="storage-row {{ $numberAmountClass }} {{ $badgeClass }} {{ $badgeRoundedClass }} {{ $progressbarbg }} number-rolling total-user-rolling {{ $textNumberClass }} result-skeletone pt-1" data-target="{{ $count }}">{{ $count }}</span>
        </span>
    </div>
</div>