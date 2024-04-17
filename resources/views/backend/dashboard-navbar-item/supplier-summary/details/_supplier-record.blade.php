<div class="col-xl-6">
    <table class="bg-transparent summary_table" id="supp_record" style="width: 100%;">
        <tr class="expenses_summ_head" id="supp_tr">
            <th id="supp_td1" class="tb_body sn_num sup_head ps-2">{{__('translate.S.N')}}</th>
            <th id="supp_td2" class="tb_body sn_num sup_head tb_heading ps-2">{{__('translate.Description')}}</th>
            <th id="supp_td3" class="tb_body sn_num sup_head ps-2">{{__('translate.Number')}}</th>
        </tr>
        <tr class="tb_heading" id="supp_tr2">
            <td id="supp_td4" class="tb_body sn_num ps-2">1</td>
            <th id="supp_td5" class="tb_body sn_num ps-2">{{__('translate.Total Supplier')}}</th>
            <td id="supp_td6" class="tb_body sn_num capsule-skeleton ps-2" style="font-weight: 700;">{{$active_supplier_counts}}.00</td>
        </tr>
        <tr class="tb_heading" id="supp_tr3">
            <td id="supp_td7" class="tb_body sn_num ps-2">2</td>
            <th id="supp_td8" class="tb_body sn_num ps-2">{{__('translate.Total Vendor')}}</th>
            <td id="supp_td9" class="tb_body sn_num capsule-skeleton ps-2" style="font-weight: 700;">{{$active_vendor_counts}}.00</td>
        </tr>
    </table>
</div>