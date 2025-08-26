<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('product_visual')}}">
        <button class="accordion-button collapsed prod_button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit rotate-icon" >
                <circle cx="12" cy="12" r="4" />
                <line x1="1.05" y1="12" x2="7" y2="12" />
                <line x1="17.01" y1="12" x2="22.96" y2="12" />
            </svg>
            <span class="text-animation">
                <span class="ps-1 {{setting('product_visual')}} {{ Request::is('product-components/category-*/index') || Request::is('product-components/sub-category-*/index') || Request::is('medicine-components/medicine-group-*/index') || Request::is('medicine-components/medicine-name-*/index') || Request::is('medicine-components/medicine-dosage-*/index') || Request::is('product-components/units-*/index') || Request::is('product-components/origin-*/index') || Request::is('product-components/brand-*/index') || Request::is('product-components/model-*/index') || Request::is('product-components/product-*/index') ? 'folder-active' : '' }}">
                    {{__('translate.Product')}}
                </span>
            </span>
            <div class="sb-sidenav-accordion-collapse-arrow layouts_block ms-auto icon-size" style="float:right;">▼</div>
        </button>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    @include('backend.layouts.layouts-components.partial-submenu-product._product_submenu')
                </div>
            </div>
        </div>
    </div>
</div>