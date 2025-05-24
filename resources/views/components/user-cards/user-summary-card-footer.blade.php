<div class="row">
    <div class="col-xl-4">
        <span class="login-user-title percentage-skeletone">{{ $title }}</span>
    </div>
    <div class="col-xl-6">
        <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped bg-light progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
        </div>
    </div>
    <div class="col-xl-2">
        <span>
            <span class="{{ $numberAmountClass }} {{ $badgeClass }} {{ $badgeRoundedClass }} {{ $progressbarbg }} number-rolling total-user-rolling {{ $textNumberClass }} result-skeletone pt-1" data-target="{{ $count }}">{{ $count }}</span>
        </span>
    </div>
</div>