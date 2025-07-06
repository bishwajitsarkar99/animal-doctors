<div class="filex-wrapper">
    <span class="filex-tab {{ $filexClas }}">
        <label class="date-label" for="from"> 
            <x-Dropdown.DownloadBox downloadBox="" downloadWidth="24" downloadHeight="18" downloadStroke="rgb(170, 170, 170)" downloadStrokeWidth="2" downloadFill="white" />
            <span id="{{ $filexFilterId }}">{{ $filexLabelName }}</span> 
        </label>
    </span>
    <div class="{{ $filexContentArea }} filex-show">
        <div class="content-area">
            <x-MenuFilexBoxs.LogFilexBox.ThreeColumnLogFilexBox />
        </div>
        <span class="{{ $filexUpArrow }}"></span>
    </div>
</div>