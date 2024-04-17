<!-- Modal -->
<div class="modal fade" id="today_sales_details_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="#">
            <div class="modal-header large_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    {{__('translate.Today Sales List')}}
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                </button>
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
                                    <table class="ord_table center border-1 skeleton-children mt-2">
                                        <tr class="table-row order_body">
                                            <th class="sn ord_headLine border_ord ps-1">{{__('translate.S.N')}}</th>
                                            <th class="txt ord_headLine ps-1">{{__('translate.Date')}}</th>
                                            <th class="txt ord_headLine ps-1">{{__('translate.Invoice-ID')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Customer Name')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Category')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Sub-Category')}}</th>
                                            <th class="tot_order_ ord_headLine ps-1">{{__('translate.Product-ID')}}</th>
                                            <th class="tot_pending_ ord_headLine ps-1">{{__('translate.Product Name')}}</th>
                                            <th class="tot_pending_ ord_headLine ps-1">{{__('translate.Brand')}}</th>
                                            <th class="tot_complete_ ord_headLine ps-1">{{__('translate.Model')}}</th>
                                            <th class="tot_complete_ ord_headLine ps-1">{{__('translate.Unit')}}</th>
                                            <th class="tot_complete_ ord_headLine ps-1">{{__('translate.Qty')}}</th>
                                            <th class="tot_complete_ ord_headLine ps-1">{{__('translate.Unit Price')}}</th>
                                            <th class="tot_reject_ ord_headLine ps-1">{{__('translate.Amounts')}} (৳)</th>
                                            <th class="tot_reject_ ord_headLine ps-1">{{__('translate.Comment')}}</th>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">1</td>
                                            <td class="txt_ ps-1">1-1-2023</td>
                                            <td class="txt_ ps-1">INV-000000</td>
                                            <td class="tot_order_ ps-1">M/s sumon Traders</td>
                                            <td class="tot_order_ ps-1">Electric</td>
                                            <td class="tot_pending_ ps-1">Fan</td>
                                            <td class="tot_pending_ ps-1">Selling Fan-MN-600</td>
                                            <td class="tot_complete_ ps-1">Selling-Fan</td>
                                            <td class="tot_complete_ ps-1">GST</td>
                                            <td class="tot_reject_ ps-1">MN-600</td>
                                            <td class="tot_reject_ ps-1">Pics</td>
                                            <td class="tot_reject_ ps-1">50.00</td>
                                            <td class="tot_reject_ ps-1">3500.00</td>
                                            <td class="tot_reject_ ps-1">1,75,000.00</td>
                                            <td class="tot_complete_ ps-1">Receive</td>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">2</td>
                                            <td class="txt_ ps-1">5-1-2023</td>
                                            <td class="txt_ ps-1">INV-000001</td>
                                            <td class="tot_order_ ps-1">MD.Faisal</td>
                                            <td class="tot_order_ ps-1">Electric</td>
                                            <td class="tot_pending_ ps-1">Fan</td>
                                            <td class="tot_pending_ ps-1">Selling Fan-MN-600</td>
                                            <td class="tot_complete_ ps-1">Selling-Fan</td>
                                            <td class="tot_complete_ ps-1">GST</td>
                                            <td class="tot_reject_ ps-1">MN-600</td>
                                            <td class="tot_reject_ ps-1">Pics</td>
                                            <td class="tot_reject_ ps-1">5.00</td>
                                            <td class="tot_reject_ ps-1">3500.00</td>
                                            <td class="tot_reject_ ps-1">17,500.00</td>
                                            <td class="tot_complete_ ps-1">Receive</td>
                                        </tr>
                                        <tr class="table-row hover">
                                            <td class="sn border_ord">3</td>
                                            <td class="txt_ ps-1">7-1-2023</td>
                                            <td class="txt_ ps-1">INV-000003</td>
                                            <td class="tot_order_ ps-1">MD.Rahat</td>
                                            <td class="tot_order_ ps-1">Electric</td>
                                            <td class="tot_pending_ ps-1">Fan</td>
                                            <td class="tot_pending_ ps-1">Selling Fan-MN-600</td>
                                            <td class="tot_complete_ ps-1">Selling-Fan</td>
                                            <td class="tot_complete_ ps-1">GST</td>
                                            <td class="tot_reject_ ps-1">MN-600</td>
                                            <td class="tot_reject_ ps-1">Pics</td>
                                            <td class="tot_reject_ ps-1">1.00</td>
                                            <td class="tot_reject_ ps-1">3500.00</td>
                                            <td class="tot_reject_ ps-1">3500.00</td>
                                            <td class="tot_complete_ ps-1">Receiveable</td>
                                        </tr>
                                        <tr class="subtotal_heading">
                                            <th colspan="13" class="total_ord_amunt_ ps-2">{{__('translate.Sub-Total')}}</th>
                                            <td class="ord_subtotal border_ pe-1">1,96,000.00 <span>৳</span></td>
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