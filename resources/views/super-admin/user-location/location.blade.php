@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
    <div class="container">
        <div class="user-loaction">
            <div class="loaction-table">
                <table class="ord_table center border-1">
                    <tr class="table-row order_body acc_setting_table">
                        <th>S.N</th>
                        <th>IP Address</th>
                        <th>Country Name</th>
                        <th>Country Code</th>
                        <th>Region Name</th>
                        <th>Region Code</th>
                        <th>City Name</th>
                        <th>Zip Code</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Area Code</th>
                        <th>TimeZone</th>
                    </tr>
                    <tbody class="bg-transparent" id="userLocationTable">
                        @if($userLocation){
                            <tr>
                                <td></td>
                                <td>{{$userLocation->ip}}</td>
                                <td>{{$userLocation->countryName}}</td>
                                <td>{{$userLocation->countryCode}}</td>
                                <td>{{$userLocation->regionName}}</td>
                                <td>{{$userLocation->regionCode}}</td>
                                <td>{{$userLocation->cityName}}</td>
                                <td>{{$userLocation->zipCode}}</td>
                                <td>{{$userLocation->latitude}}</td>
                                <td>{{$userLocation->longitude}}</td>
                                <td>{{$userLocation->areaCode}}</td>
                                <td>{{$userLocation->timeZone}}</td>
                            </tr>
                        }
                        else{
                            <tr>
                                <td>Data Not Found</td>
                            </tr>
                        }
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@push('scripts')
<script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }

  setTimeout(() => {
    fetchData();
  }, 1000);
</script>
@endpush