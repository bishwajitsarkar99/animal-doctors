<!-- Modal -->
<div class="modal fade" id="historyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    History Of Subscription
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="{{__('translate.Close')}}"></button>
            </div>

            <div class="modal-body profile-body pb-1">

                <div class="row profile-heading pb-3">
                    <div class="history-record-summary">
                        <table class="striped responsive" style="background-color: #fff4df;">
                            <thead>
                                <tr>
                                    <th class="history_table" style="text-align:center">S.N</th>
                                    <th class="history_table ps-2">Month</th>
                                    <th class="history_table" style="text-align:center">Number Of Subscription</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history_newsletter_counts as $key => $count)
                                <tr style="font-weight: 500;color:black;">
                                    <td class="history_table" style="text-align: center;">{{ $key + 1 }}</td>
                                    <td class="history_table ps-2">{{ date('F Y', mktime(0, 0, 0, $count->month, 1)) }}</td>
                                    <td class="history_table" style="text-align: center;">{{ $count->total }}.00</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="font-weight: 700;color:black;">
                                    <td colspan="2" style="text-align: center;">Total</td>
                                    <td style="text-align: center;">
                                        <span>{{$history_newsletter_counts->sum('total')}} <span>.00</span></span>
                                        
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer profile_modal_footer">
                <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="postDelt4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>