<div class="col-xl-6">
    <table class="bg-transparent summary_table skeleton" style="width: 100%;">
        <tr class="expenses_summ_head skeleton">
            <th class="tb_body sn_num sup_head skeleton ps-2">{{__('translate.S.N')}}</th>
            <th class="tb_body sn_num sup_head tb_heading skeleton ps-2" colspan="3">{{__('translate.Vendor')}}</th>
            <th class="tb_body sn_num sup_head skeleton ps-2">{{__('translate.Number Of Vendor')}}</th>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">1</td>
            <th colspan="3" class="tb_body sn_num skeleton  ps-2">{{__('translate.Total Vendor')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$total_vendor_counts}}.00</td>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">2</td>
            <th colspan="3" class="tb_body sn_num skeleton ps-2">{{__('translate.Total Active Vendor')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$active_vendor_counts}}.00</td>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">3</td>
            <th colspan="3" class="tb_body sn_num skeleton ps-2">{{__('translate.Total Inactive Vendor')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$inactive_vendor_counts}}.00</td>
        </tr>
    </table>
</div>    