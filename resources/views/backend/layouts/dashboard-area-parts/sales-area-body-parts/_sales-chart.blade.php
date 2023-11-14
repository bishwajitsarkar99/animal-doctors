<div class="card order_line_chart mb-1 pb-1 mt-2">
    <div class="card-header staticrept ch ps-2">
        <span class="totord_srp plantform ms-4"><i class="fa-solid fa-layer-group"></i>
            {{__('translate.Statistical Sales Display')}}</span><span class="small_let plantform ps-1">{{__('translate.(Accroding to monthly)')}}
        </span>
        <div id="loader_salesChart"></div>
    </div>
    <div class="card-body chart"><canvas id="myBarChart" width="100%" height="35"></canvas></div>
</div>