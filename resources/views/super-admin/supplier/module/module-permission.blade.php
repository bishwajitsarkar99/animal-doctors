<div class="row">
    <div class="d-flex align-items-center justify-content-center min-vh-20">
        <div class="container">
            <div class="card card-body permission-card">
                <form class="form-control form-control-sm gx-2" style="border:none;">
                    @csrf
                    <table>
                        <tbody>
                            <tr class="row" style="display:none;">
                                <div class="col-xl-12">
                                    <label class="label-one ms-2" for="supplier-label">
                                        Module Name 
                                        <input type="checkbox" id="moduleNameChecking" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Checking Edit Name" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    </label>
                                    <input class="ps-1" type="text" name="supplier_title" value="{{setting('supplier_title')}}" style="color:black;" placeholder="Label Name" id="labelID" disabled>
                                </div>
                            </tr>
                            <div class="row mt-1">
                                <div class="col-xl-12">
                                    <label class="label-three ms-2" for="supplier-label">Module Name Display</label>
                                    <select id="urlDisplayID" class="ps-1 form-control form-control-sm" name="supplier_title_visual" style="color:black;cursor: pointer;">
                                        <option class="sub_name_text" value="" disabled>Select Display</option>
                                        <option class="sub_name_text" value="{{setting('supplier_title_visual')}}">Display : {{setting('supplier_title_visual')}}</option>
                                        <option class="sub_name_text" value="block">block</option>
                                        <option class="sub_name_text" value="hidden">hidden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xl-12">
                                    <label class="label-two ms-2" for="supplier-label">
                                        Module URL Link 
                                        <input type="checkbox" id="moduleURLChecking" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Checking Edit URL" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    </label>
                                    <input class="ps-1" type="text" name="supplier_setup_link" value="{{setting('supplier_setup_link')}}" placeholder="URL Name" style=" text-decoration: underline;text-decoration-color: blue;" id="urlID" disabled>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xl-12">
                                    <label class="label-three ms-2" for="supplier-label">Module Display</label>
                                    <select id="urlmouleDisplayID" class="ps-1 form-control form-control-sm" name="supplier_setup_display" style="color:black;cursor: pointer;">
                                        <option class="sub_name_text" value="" disabled>Select Display</option>
                                        <option class="sub_name_text" value="{{setting('supplier_setup_display')}}">Display-Supplier : {{setting('supplier_setup_display')}}</option>
                                        <option class="sub_name_text" value="block">block</option>
                                        <option class="sub_name_text" value="hidden">hidden</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-sm subm_btn module_btn skeleton  mt-2 mb-2 ms-1" id="supplierModule">
                                <i class="module-icon fa fa-spinner fa-spin module-hidden"></i>
                                Module-Access
                            </button>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>