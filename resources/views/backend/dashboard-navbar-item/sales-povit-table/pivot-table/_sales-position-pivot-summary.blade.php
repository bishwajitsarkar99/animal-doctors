<div class="col-xl-6">
    <h5 class="ord_summ mt-2 ms-2" id="sales_head">{{__('translate.Monthly Product Sales Position')}}</h5>
    <table class="bg-transparent ord_table capsule-skeleton" id="sal_position" style="width: 100%;">
        <tr class="expenses_summ_head capsule-skeleton" id="sal_position_tr">
            <th class="tot_ord_heading sales_head capsule-skeleton tb_heading" id="sal_position_td" colspan="5">{{__('translate.Total Sales Record')}}</th>
        </tr>
        <tr class="tb_heading capsule-skeleton" id="sal_position_tr2">
            <th class="ps-2 capsule-skeleton" id="sal_position_td2">{{__('translate.S.N')}}</th>
            <th class="ps-2 catg capsule-skeleton" id="sal_position_td3">{{__('translate.Description')}}</th>
            <th class="ps-2 od capsule-skeleton" id="sal_position_td4">{{__('translate.Invoice')}} (Qt)</th>
            <th class="ps-2 amu capsule-skeleton" id="sal_position_td5">{{__('translate.Sales Amount')}}<span class="sym">(৳)</span></th>
        </tr>

        <tr id="sal_position_tr3 capsule-skeleton">
            <td class="tb_body capsule-skeleton sn_num ps-2" id="sal_position_td6">1</td>
            <td class="tb_body capsule-skeleton text-gray-700 ps-2 recv_color" id="sal_position_td7">{{__('translate.Invoice Receive (Sales)')}}</td>
            <td class="tb_body capsule-skeleton text-gray-700 ps-2 recv_color" id="sal_position_td8">25.00</td>
            <td class="tb_body capsule-skeleton text-gray-700 ps-2 recv_color" id="sal_position_td9">50,000.00</td>
        </tr>
        <tr id="sal_position_tr4 capsule-skeleton">
            <td class="tb_body capsule-skeleton sn_num ps-2" id="sal_position_td10">2</td>
            <td class="tb_body capsule-skeleton text-primary ps-2" id="sal_position_td11">{{__('translate.Invoice Receiveable (Sales)')}}</td>
            <td class="tb_body capsule-skeleton text-primary ps-2" id="sal_position_td12">25.00</td>
            <td class="tb_body capsule-skeleton text-primary ps-2" id="sal_position_td13">50,000.00</td>
        </tr>
        <tr id="sal_position_tr5 capsule-skeleton">
            <th colspan="2" class="total_ord_amunt_ capsule-skeleton ps-2" id="sal_position_td14">{{__('translate.Sub Total Sales')}}</th>
            <td class="ord_sutotal_qty capsule-skeleton pe-1" id="sal_position_td15">75.00</td>
            <td class="ord_subtotal capsule-skeleton pe-1" id="sal_position_td16">3,00,000.00 <span class="sym capsule-skeleton">৳</span></td>
        </tr>
    </table>
</div>