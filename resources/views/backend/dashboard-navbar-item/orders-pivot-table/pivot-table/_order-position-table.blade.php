<div class="col-xl-6">
    <h5 class="ord_summ mt-2 ms-2" id="sales_record">{{__('translate.Monthly Product Order Position')}}</h5>
    <table class="bg-transparent ord_table capsule-skeleton" style="width: 100%;" id="sales_tr">
        <tr class="expenses_summ_head capsule-skeleton" id="sales_td">
            <th class="tot_ord_heading tb_heading order_head capsule-skeleton" id="sales_td2" colspan="5">{{__('translate.Total order Record')}}</th>
        </tr>
        <tr class="tb_heading capsule-skeleton" id="sales_tr2">
            <th class="ps-2 capsule-skeleton" id="sales_td3">{{__('translate.S.N')}}</th>
            <th class="ps-2 capsule-skeleton catg" id="sales_td4">{{__('translate.Description')}}</th>
            <th class="ps-2 capsule-skeleton od" id="sales_td5">{{__('translate.Order')}} (Qt)</th>
            <th class="ps-2 capsule-skeleton amu" id="sales_td6">{{__('translate.Amount')}}<span class="sym">(৳)</span></th>
        </tr>

        <tr id="sales_tr3 capsule-skeleton">
            <td class="tb_body sn_num ps-2 capsule-skeleton" id="sales_td7">1</td>
            <td class="tb_body text-gray-700 ps-2 capsule-skeleton" id="sales_td8">{{__('translate.Total Pending Order')}}</td>
            <td class="tb_body text-gray-700 ps-2 capsule-skeleton" id="sales_td9">25.00</td>
            <td class="tb_body text-gray-700 ps-2 capsule-skeleton" id="sales_td10">50,000.00</td>
        </tr>
        <tr id="sales_tr4 capsule-skeleton">
            <td class="tb_body sn_num ps-2 capsule-skeleton" id="sales_td11">2</td>
            <td class="tb_body text-primary ps-2 capsule-skeleton" id="sales_td12">{{__('translate.Total Complete Order')}}</td>
            <td class="tb_body text-primary ps-2 capsule-skeleton" id="sales_td13">25.00</td>
            <td class="tb_body text-primary ps-2 capsule-skeleton" id="sales_td14">50,000.00</td>
        </tr>
        <tr id="sales_tr5 capsule-skeleton">
            <td class="tb_body sn_num ps-2 capsule-skeleton" id="sales_td15">3</td>
            <td class="tb_body text-danger ps-2 capsule-skeleton" id="sales_td16">{{__('translate.Total Reject Order')}}</td>
            <td class="tb_body text-danger ps-2 capsule-skeleton" id="sales_td17">25.00</td>
            <td class="tb_body text-danger ps-2 capsule-skeleton" id="sales_td18">50,000.00</td>
        </tr>
        <tr class="tb_heading capsule-skeleton" id="sales_tr6">
            <th colspan="2" class="total_ord_amunt_ ps-2 capsule-skeleton" id="sales_td19">{{__('translate.Sub Total Order')}}</th>
            <td class="ord_sutotal_qty pe-1 capsule-skeleton" id="sales_td20">75.00</td>
            <td class="ord_subtotal pe-1 capsule-skeleton" id="sales_td21">3,00,000.00 <span class="sym" id="sales_td22">৳</span></td>
        </tr>
    </table>
</div>