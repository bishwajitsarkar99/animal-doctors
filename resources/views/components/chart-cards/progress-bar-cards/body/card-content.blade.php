@props([
    'cardLabelClass'=>'',
    'cardLabel'=>'',
    'cardProgressClass'=>'',
    'cardProgressStyle'=>'',
    'cardResultId'=>'',
    'cardProgressBg'=>'',
    'cardBadgeRounded'=>'',
    'cardBadgeRoundedStyle'=>'',
    'cardRecordClass'=>'',
    'cardRecordStyle'=>'',
    'cardRecordId'=>'',
])
<div class="row">
    <div class="col-xl-4">
        <span class="{{ $cardLabelClass }}">{{ $cardLabel }}</span>
    </div>
    <div class="col-xl-6">
        <div class="{{ $cardProgressClass }}" style="{{ $cardProgressStyle }}">
            <div id="{{ $cardResultId }}" class="progress-bar progress-bar-striped {{ $cardProgressBg }} progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                0%
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <label class="{{ $cardBadgeRounded }} {{ $cardProgressBg }}" for="total_medic_records " id="iteam_label4" style="{{ $cardBadgeRoundedStyle }}">
            <span class="{{ $cardRecordClass }}" style="{{ $cardRecordStyle }}" id="{{ $cardRecordId }}"></span>
            <span id="iteam_label5" style="{{ $cardRecordStyle }}">.00</span>
        </label>
    </div>
</div>