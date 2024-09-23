@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body" id="table_card_body">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card-body focus-color user_details cd skeleton">
            <p>List</p>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body focus-color user_details cd skeleton">
            <!-- <p class="users_heading skeleton mb-1">Users <span class="ms-1 skeleton">Update and Permission</span></p> -->
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_to" placeholder="To :"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_cc" placeholder="CC :"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_bcc" placeholder="BCC :"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="subject" placeholder="Subject :"/>
            </div>
            <div class="form-group">
              <textarea class="form-control form-control-sm main_content" id="email_summernote" name="main_content" cols="30" rows="10" placeholder="Email Content"></textarea>
            </div>
            <div class="form-group">
              <button id="submit" type="submit" class="btn btn-sm btn-primary send_button button-skeleton">
                <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="btn-text">Send</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
    </div>
  </div>
</div>

@endsection
@section('css')
<link rel="style" type="email" href="{{asset('backend/support_asset')}}/email/email.css">
@endsection
@push('scripts')
<!-- Summar-Note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
<script type="module">
  import { removeSkeletonClass } from "{{asset('/module/module-min-js/design-helper-function-min.js')}}";

  $(document).ready(function(){
    // skeletone
    const skeletonClasses = [
      'skeleton',
    ];
    
    setTimeout(() => {
      removeSkeletonClass(skeletonClasses);
    }, 1000);

  });
</script>
<!-- Summary Note Initialize -->
<script>
  $(document).ready(function() {
    $("#email_summernote").summernote({
      placeholder: 'Email content',
      tabsize: 2,
      height: 190,
      minHeight: null,
      maxHeight: null,
      
    });
    $('.dropdown-toggle').dropdown();
  });
</script>
@endpush