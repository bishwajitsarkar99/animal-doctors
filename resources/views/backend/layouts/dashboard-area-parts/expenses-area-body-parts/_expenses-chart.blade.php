<div class="card order_line_chart pb-1 mt-2">
    <div class="card-header staticrept plantform ch ps-2">
        <span class="totord_srp plantform ms-4"><i class="fa-solid fa-layer-group"></i>
            {{__('translate.Statistical Expenses Display')}}</span><span class="small_let plantform ps-1">{{__('translate.(Accroding to,time of period)')}}
        </span>
        <div id="loader_expensesChart"></div>
    </div>
    <div class="card-body chart">
        <canvas id="myChartexp" width="100%" height="35"></canvas>
    </div>
</div>