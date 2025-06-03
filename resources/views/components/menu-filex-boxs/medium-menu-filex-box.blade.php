<div class="filex-wrapper">
    <span class="filex-tab {{ $filexGroup }}">
        <label class="date-label" for="from"> 
            <x-dropdown.filter-box filterBox="" filterWidth="24" filterHeight="18" filterStroke="rgb(170, 170, 170)" filterStrokeWidth="2" filterFill="white" />
            <span id="{{ $filexId }}">{{ $filexLabel }}</span> 
        </label>
    </span>
    <div class="{{ $filexContent }}">
        <div class="content-area">
            <div class="row drag-row">
                <div class="col-xl-4 drag-column">
                    <div class="card filex-column-card group-card" draggable="true">
                        <div class="card-header filex-column-card-header filex-group">
                            <span class="move-icon">
                                <svg viewBox="0 0 24 24" width="18" height="14" stroke="darkcyan" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                            </span>
                            <span class="card-label">
                                <span>Branch</span>
                            </span>
                            <span class="search-box dropstart">
                                <a class="dropdown-toggle" id="search_Dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
                                    search
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="search_Dropdown" id="filexBoxMenu">
                                    <span class="input-search-box">
                                        <span class="icon-box">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"/>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                            </svg>
                                        </span>
                                        <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="Branch Search" id="search" />
                                    </span>
                                </ul>
                            </span>
                        </div>
                        <div class="card-body filex-column-card-body">
                            <ul class="first-filex-group">
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                            </ul>
                        </div>
                        <div class="card-footer filex-column-card-footer">
                            <div class="group-filex-button">
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Remove</button>
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 drag-column">
                    <div class="card filex-column-card group-card" draggable="true">
                        <div class="card-header filex-column-card-header filex-group">
                            <span class="move-icon">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="darkcyan" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                            </span>
                            <span class="card-label ms-5">
                                <span>Role</span>
                            </span>
                            <span class="search-box dropstart">
                                <a class="dropdown-toggle" id="search_Dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
                                    search
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="search_Dropdown" id="filexBoxMenu">
                                    <span class="input-search-box">
                                        <span class="icon-box">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"/>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                            </svg>
                                        </span>
                                        <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="Branch Search" id="search" />
                                    </span>
                                </ul>
                            </span>
                        </div>
                        <div class="card-body filex-column-card-body">
                            <ul class="first-filex-group">
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                            </ul>
                        </div>
                        <div class="card-footer filex-column-card-footer">
                            <div class="group-filex-button">
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Remove</button>
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 drag-column">
                    <div class="card filex-column-card group-card" draggable="true">
                        <div class="card-header filex-column-card-header filex-group">
                            <span class="move-icon">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="darkcyan" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                            </span>
                            <span class="card-label ms-5">
                                <span>Email</span>
                            </span>
                            <span class="search-box dropstart">
                                <a class="dropdown-toggle" id="search_Dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
                                    search
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="search_Dropdown" id="filexBoxMenu">
                                    <span class="input-search-box">
                                        <span class="icon-box">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"/>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                            </svg>
                                        </span>
                                        <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="Branch Search" id="search" />
                                    </span>
                                </ul>
                            </span>
                        </div>
                        <div class="card-body filex-column-card-body">
                            <ul class="first-filex-group">
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                                <li>Dhaka Branch</li>
                                <li>Rangpur Branch</li>
                                <li>Barisal Branch</li>
                                <li>Natore Branch</li>
                                <li>Gazipur Branch</li>
                                <li>Rajshahi Branch</li>
                            </ul>
                        </div>
                        <div class="card-footer filex-column-card-footer">
                            <div class="group-filex-button">
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Remove</button>
                                <button type="button" class="btn btn-sm refresh-btn ripple-surface" id="#">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="{{ $filexBoxArrow }}"></span>
    </div>
</div>