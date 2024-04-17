<!-- Modal -->
<div class="modal fade" id="today_expneses_details_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="#">
            <div class="modal-header large_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    {{__('translate.Today Expneses List')}}
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"</div>'></button>
            </div>
            <div class="modal-body large-modal-body">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-12 ps-2">
                            <div class="card-body focus-color cd pt-3 pb-4">
                                <!-- <span class="tol_ord mt-1">
                                    <label for="expenses" class="select_labelOne">Start Date :</label>
                                    <input type="date" class="select_dateOne large-modal-body">
                                </span>
                                <span class="tol_ord mt-1 ms-2">
                                    <label for="expenses" class="select_labelOne">End Date :</label>
                                    <input type="date" class="select_dateOne large-modal-body">
                                </span> -->
                                <div style="overflow-x:auto;">
                                    <table class="ord_table center border-1 mt-2" id="expensesTableThree">
                                        <tr class="table-row order_body">
                                            <th class="sn ord_headLine border_ord ps-1">{{__('translate.S.N')}}</th>
                                            <th class="txt ord_headLine ps-1">{{__('translate.Date')}}</th>
                                            <th class="txt ord_headLine ps-1">{{__('translate.Voucher-no.')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Description')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Head Of Accounts')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Qty')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Unit')}}</th>
                                            <th class="tot_reject_ ord_headLine ps-1">{{__('translate.Unit Price')}} (৳)</th>
                                            <th class="tot_reject_ ord_headLine ps-1">{{__('translate.Total Amount')}} (৳)</th>
                                            <th class="tot_reject_ ord_headLine ps-1">{{__('translate.Comment')}}</th>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">1</td>
                                            <td class="txt_ ps-1">1-1-2023</td>
                                            <td class="txt_ ps-1">EXP-000000</td>
                                            <td class="tot_order_ ps-1">Purpose of purchasing goods(Product-Fan)</td>
                                            <td class="tot_order_ ps-1">purchasing</td>
                                            <td class="tot_order_ ps-1">5.00</td>
                                            <td class="tot_pending_ ps-1">Carton</td>
                                            <td class="tot_pending_ ps-1">3,000.00</td>
                                            <td class="tot_complete_ ps-1">15,000.00</td>
                                            <td class="tot_complete_ ps-1">Paid</td>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">2</td>
                                            <td class="txt_ ps-1">1-6-2023</td>
                                            <td class="txt_ ps-1">EXP-000001</td>
                                            <td class="tot_order_ ps-1">Purpose of Transport(Product Carry on)</td>
                                            <td class="tot_order_ ps-1">Transport</td>
                                            <td class="tot_order_ ps-1"></td>
                                            <td class="tot_pending_ ps-1"></td>
                                            <td class="tot_pending_ ps-1">5,000.00</td>
                                            <td class="tot_complete_ ps-1">5,000.00</td>
                                            <td class="tot_complete_ ps-1">Paidable</td>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">3</td>
                                            <td class="txt_ ps-1">1-6-2023</td>
                                            <td class="txt_ ps-1">EXP-000002</td>
                                            <td class="tot_order_ ps-1">Purpose of Salary Payment</td>
                                            <td class="tot_order_ ps-1">Salary</td>
                                            <td class="tot_order_ ps-1"></td>
                                            <td class="tot_pending_ ps-1"></td>
                                            <td class="tot_pending_ ps-1">35,000.00</td>
                                            <td class="tot_complete_ ps-1">35,000.00</td>
                                            <td class="tot_complete_ ps-1">Paid</td>
                                        </tr>
                                        <tr class="subtotal_heading">
                                            <th colspan="8" class="total_ord_amunt_ ps-2">{{__('translate.Sub-Total')}}</th>
                                            <td class="ord_subtotal border_ pe-1">55,000.00 <span>৳</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>