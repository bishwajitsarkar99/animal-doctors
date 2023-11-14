<div class="col-xl-12">
    <div>
        <div class="row">
            <div class="col-md-12 ps-2">
                <div class="card-body focus-color order_details cd" id="orderdetails">
                    <div style="overflow-x:auto;">
                        <table class="bg-transparent ord_table center border-1 capsule-skeleton" id="orderdetailsTable">
                            <tr class="table-body order_body capsule-skeleton" id="orderdetails_tr">
                                <th colspan="3" class="th_order order_head capsule-skeleton" id="orderdetails_td">{{__('translate.Description')}}</th>
                                <th colspan="2" class="tot_ord_head order_head capsule-skeleton" id="orderdetails_td2">{{__('translate.Total Order')}}</th>
                                <th colspan="2" class="tot_pending_head_ order_head capsule-skeleton" id="orderdetails_td3">{{__('translate.Total Pending Order')}}</th>
                                <th colspan="2" class="tot_complete_head_ order_head capsule-skeleton" id="orderdetails_td4">{{__('translate.Total Complete Order')}}</th>
                                <th colspan="2" class="tot_reject_head_ order_head capsule-skeleton" id="orderdetails_td5">{{__('translate.Total Reject Order')}}</th>
                                <th colspan="2" class="tot_accuracy_head_ order_head capsule-skeleton" id="orderdetails_td6">{{__('translate.Order Accuracy')}}</th>
                            </tr>
                            <tr class="table-body order_body capsule-skeleton" id="orderdetails_tr2">
                                <th class="sn border_ord capsule-skeleton" id="orderdetails_td7">{{__('translate.S.N')}}</th>
                                <th class="txt ps-1 capsule-skeleton" id="orderdetails_td8">{{__('translate.Month')}}</th>
                                <th class="txt ps-1 capsule-skeleton" id="orderdetails_td9">{{__('translate.Category')}}</th>
                                <th class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td10">{{__('translate.Amount')}} (৳)</th>
                                <th class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td11">{{__('translate.Qty')}}</th>
                                <th class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td12">{{__('translate.Amount')}} (৳)</th>
                                <th class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td13">{{__('translate.Qty')}}</th>
                                <th class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td14">{{__('translate.Amount')}} (৳)</th>
                                <th class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td15">{{__('translate.Qty')}}</th>
                                <th class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td16">{{__('translate.Amount')}} (৳)</th>
                                <th class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td17">{{__('translate.Qty')}}</th>
                                <th class="tot_od capsule-skeleton" id="orderdetails_td18">{{__('translate.Total Order')}}</th>
                                <th class="tot_comp capsule-skeleton" id="orderdetails_td19">{{__('translate.Total Complete Order')}}</th>
                            </tr>
                            <tr class="table-body capsule-skeleton" id="orderdetails_tr3">
                                <td class="sn border_ord capsule-skeleton" id="orderdetails_td20">1</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td21">January</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td22">Total Electronics</td>
                                <td class="tot_ capsule-skeleton order_ ps-1" style="text-align: left;" id="orderdetails_td23">50,000.00</td>
                                <td class="tot_ capsule-skeleton order_ ps-1" style="text-align: left;" id="orderdetails_td24">500.00</td>
                                <td class="tot_ capsule-skeleton pending_ ps-1" style="text-align: left;" id="orderdetails_td25">10,000.00</td>
                                <td class="tot_ capsule-skeleton pending_ ps-1" style="text-align: left;" id="orderdetails_td26">70.00</td>
                                <td class="tot_ capsule-skeleton complete_ ps-1" style="text-align: left;" id="orderdetails_td27">50.00</td>
                                <td class="tot_ capsule-skeleton complete_ ps-1" style="text-align: left;" id="orderdetails_td28">50.00</td>
                                <td class="tot_ capsule-skeleton reject_ ps-1" style="text-align: left;" id="orderdetails_td29">50.00</td>
                                <td class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td30">50.00</td>
                                <td rowspan="20" class="tot_od capsule-skeleton" id="orderdetails_td31">50.00 <span id="orderdetails_td33">৳</span></td>
                                <td rowspan="20" class="tot_comp capsule-skeleton" id="orderdetails_td32">50.00 <span id="orderdetails_td34">৳</span></td>
                            </tr>
                            <tr class="table-body capsule-skeleton" id="orderdetails_tr4">
                                <td class="sn border_ord capsule-skeleton" id="orderdetails_td33">2</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td34">January</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td35">Total Electric</td>
                                <td class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td36">94,000.00</td>
                                <td class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td37">900.00</td>
                                <td class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td38">8,000.00</td>
                                <td class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td39">58.00</td>
                                <td class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td40">94.00</td>
                                <td class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td41">94.00</td>
                                <td class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td42">94.00</td>
                                <td class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td43">94.00</td>
                            </tr>
                            <tr class="table-body capsule-skeleton" id="orderdetails_tr5">
                                <td class="sn border_ord capsule-skeleton" id="orderdetails_td44">3</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td45">January</td>
                                <td class="txt_ capsule-skeleton ps-1" id="orderdetails_td46">Total Fashion</td>
                                <td class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td47">67,000.00</td>
                                <td class="tot_order_ capsule-skeleton ps-1" id="orderdetails_td48">600.00</td>
                                <td class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td49">9,000.00</td>
                                <td class="tot_pending_ capsule-skeleton ps-1" id="orderdetails_td50">150.00</td>
                                <td class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td51">67.00</td>
                                <td class="tot_complete_ capsule-skeleton ps-1" id="orderdetails_td52">67.00</td>
                                <td class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td53">67.00</td>
                                <td class="tot_reject_ capsule-skeleton ps-1" id="orderdetails_td54">67.00</td>
                            </tr>
                            <tr class="tb_heading capsule-skeleton" id="orderdetails_tr6">
                                <th colspan="3" class="total_ord_amunt_ capsule-skeleton ps-2" id="orderdetails_td55">{{__('translate.Sub-Total')}}</th>
                                <td class="ord_subtotal border_ capsule-skeleton pe-1" id="orderdetails_td56">2,11,000.00 <span id="orderdetails_td64">৳</span></td>
                                <td class="ord_sutotal_qty border_qty capsule-skeleton pe-1" id="orderdetails_td57">2,000.00</td>
                                <td class="ord_subtotal border_ capsule-skeleton pe-1" id="orderdetails_td58">27,000.00 <span id="orderdetails_td65">৳</span></td>
                                <td class="ord_sutotal_qty border_qty capsule-skeleton pe-1" id="orderdetails_td59">278.00</td>
                                <td class="ord_subtotal border_ capsule-skeleton pe-1" id="orderdetails_td60">211.00 <span id="orderdetails_td66">৳</span></td>
                                <td class="ord_sutotal_qty border_qty capsule-skeleton pe-1" id="orderdetails_td61">211.00</td>
                                <td class="ord_subtotal border_ capsule-skeleton pe-1" id="orderdetails_td62">211.00 <span id="orderdetails_td67">৳</span></td>
                                <td class="ord_sutotal_qty border_qty capsule-skeleton pe-1" id="orderdetails_td63">211.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>