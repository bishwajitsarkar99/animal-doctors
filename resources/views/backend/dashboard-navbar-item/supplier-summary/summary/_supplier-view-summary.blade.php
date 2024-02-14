<div class="col-xl-6">
    <table class="bg-transparent summary_table skeleton" style="width: 100%;">
        <tr class="expenses_summ_head skeleton">
            <th class="tb_body sn_num sup_head skeleton ps-2">{{__('translate.S.N')}}</th>
            <th class="tb_body sn_num sup_head tb_heading skeleton ps-2" colspan="3">{{__('translate.Supplier')}}</th>
            <th class="tb_body sn_num sup_head skeleton ps-2">{{__('translate.Number Of Supplier')}}</th>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">1</td>
            <th colspan="3" class="tb_body sn_num skeleton ps-2">{{__('translate.Total Supplier')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$total_supplier_counts}}.00</td>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">2</td>
            <th colspan="3" class="tb_body sn_num skeleton ps-2">{{__('translate.Total Active Supplier')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$active_supplier_counts}}.00</td>
        </tr>
        <tr class="tb_heading skeleton">
            <td class="tb_body sn_num skeleton ps-2">3</td>
            <th colspan="3" class="tb_body sn_num skeleton ps-2">{{__('translate.Total Inactive Supplier')}}</th>
            <td class="tb_body sn_num skeleton capsule-skeleton ps-2">{{$inactive_supplier_counts}}.00</td>
        </tr>
    </table>
</div>
