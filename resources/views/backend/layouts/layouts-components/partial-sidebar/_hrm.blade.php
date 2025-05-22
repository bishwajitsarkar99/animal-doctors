<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('hrm_visual')}}">
        <button class="accordion-button collapsed hm_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
                <circle cx="12" cy="12" r="4" />
                <line x1="1.05" y1="12" x2="7" y2="12" />
                <line x1="17.01" y1="12" x2="22.96" y2="12" />
            </svg>
            <span class="prod_label">
                <span class="text-animation {{setting('hrm_visual')}}">{{__('translate.Hrm')}}</span>
            </span>
            <div class="sb-sidenav-accordion-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Employee ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-hrm._hrm-submenu')
                </div>
            </div>
        </div>
    </div>
</div>