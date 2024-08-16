@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
    <div class="card form-control form-control-sm">
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
    
                        </tbody>
                    </table>
                </div>
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

<!-- .form-control-sm {
    min-height: calc(1.5em + 0.5rem + 2px);
    padding: 0.5rem 0rem;
    font-size: 0.75rem;
    border-radius: 0.25rem;
} -->