<div class="card order_line_chart mt-2 pb-1" id="orderChart">
    <div class="card-header staticrept ch ps-2 mt-">
        <span class="totord_srp plantform ms-4"><i class="fa-solid fa-layer-group"></i>
            {{__('translate.Statistical Orders View')}}</span><span class="small_let plantform ps-1">{{__('translate.(Accroding to monthly)')}}

        </span>
        <div id="loader_orderChart"></div>
    </div>
    <div class="card-body chart">
        <canvas id="myAreaChart" width="100%" height="35"></canvas>
    </div>
</div>

@push('scripts')
<script>
var xValues = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

var getColor = (role)=> {
    if(role === 'supper_admin'){
        return "darkblue";
    }
    if(role === 'sub_admin'){
        return "orange";
    }
    if(role === 'admin'){
        return "darkgreen";
    }
    return  "orangered";
}
var datasets = [
    @foreach($userCountCurentYear as $key => $value)
    { 
      label: "{{$key}}",
      data: [{{implode(',', $value)}}],
      borderColor: getColor("{{$key}}"),
      fill: false
    },
    @endforeach
];



new Chart("myAreaChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: datasets
  },
  options: {
    legend: {display: true},
    gridLines: {
      display: true
    }
  }
});
</script>
@endPush