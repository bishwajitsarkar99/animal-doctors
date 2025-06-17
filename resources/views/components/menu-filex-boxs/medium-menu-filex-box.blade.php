<div class="filex-wrapper">
    <span class="filex-tab {{ $filexClas }}">
        <label class="date-label" for="from"> 
            <x-dropdown.filter-box filterBox="" filterWidth="24" filterHeight="18" filterStroke="rgb(170, 170, 170)" filterStrokeWidth="2" filterFill="white" />
            <span id="{{ $filexFilterId }}">{{ $filexLabelName }}</span> 
        </label>
    </span>
    <div class="{{ $filexContentArea }} filex-show">
        <div class="content-area">
            <x-menu-filex-boxs.log-filex-box.three-column-log-filex-box />
        </div>
        <span class="{{ $filexUpArrow }}"></span>
    </div>
</div>