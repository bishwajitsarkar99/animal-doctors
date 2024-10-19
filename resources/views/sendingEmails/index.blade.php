@extends('backend.layouts.dashboard')

@section('content')

@include('backend.layouts.dashboard-components._navbar')
<div id="viewer"></div>
<div class="card form-control form-control-sm" id="set_table">
  <div class="card-body" id="table_card_body">
    <div class="row">
      <div class="col-md-4">
        <div class="card-body focus-color user_details cd skeleton">
          <p class="email_list">Email Send List</p>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body focus-color user_details cd skeleton">
          <form id="emailForm" action="{{route('email.send')}}" method="POST">
            @csrf
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_to" id="inputTo" placeholder="To" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_cc" id="inputCC" placeholder="CC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="user_bcc" id="inputBCC" placeholder="BCC" value="" data-role="tagsinput"/>
            </div>
            <div class="form-group mb-1">
              <input class="form-control form-control-sm" type="text" name="subject" id="inputSubject" placeholder="Subject"/>
            </div>
            <div class="form-group">
              <textarea class="form-control form-control-sm main_content" id="email_summernote" name="main_content" cols="30" rows="10" placeholder="Email Content"></textarea>
            </div>
            <div class="row">
              <div class="col-xl-12">
                <label class="label-attach" for="email_attachment">Attach File</label>
                <table>
                  <thead>
                    <tr>
                      <th class="file-head">File-Name</th>
                      <th class="file-head">Add</th>
                    </tr>
                  </thead>
                  <tbody id="fileTable">
                    <tr class="file-row">
                      <td class="file-column">
                        <input type="file" class="form-control form-control-sm attachment" name="email_attachments[]" id="email_attachment" multiple />
                      </td>
                      <td class="file-column">
                        <span class="more__button">
                          <a class="btn btn-group-sm" href="#" id="moreBtn">
                            <span style="font-size:20px;color:#0056b3;"><i class="fa-solid fa-circle-plus"></i></span>
                          </a>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-10 action_message">
                @if(session('success'))
                  <p class="background_success mt-2 ps-1" id="success_message">{{session('success')}}</p>
                @endif
              </div>
              <div class="col-xl-2" style="text-align:right;">
                <button id="submit" type="submit" class="btn btn-sm btn-primary send_button button-skeleton mt-2">
                  <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                  <span class="btn-text">Send</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/email/email.css">
<link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
@endsection
@push('scripts')
<!-- Summar-Note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
<script type="module">
  import { 
    removeSkeletonClass, 
    buttonLoader, 
    handleSuccessMessage, 
  } from "{{asset('/module/module-min-js/design-helper-function-min.js')}}";
  buttonLoader();
  $(document).ready(function(){
    // skeletone
    const skeletonClasses = [
      'skeleton',
    ];
    
    setTimeout(() => {
      removeSkeletonClass(skeletonClasses);
    }, 1000);

    // Initialize the button loader for the login button
    buttonLoader('#submit', '.loading-icon', '.btn-text', 'Send...', 'Send', 6000);
    // Initialize the message
    handleSuccessMessage('#success_message');


    // Table row increment
    document.getElementById('moreBtn').addEventListener('click', function(e) {
      e.preventDefault();

      var tableBody = document.querySelector('#fileTable');
      
      var firstRow = document.querySelector('#fileTable tr:first-child');
      // Clone the last row
      var newRow = firstRow.cloneNode(true);

      newRow.querySelector('.attachment').value = '';

      tableBody.appendChild(newRow);
    });
  });
</script>
<!-- Summary Note Initialize -->
<script>
  $(document).ready(function() {
    $("#email_summernote").summernote({
      placeholder: 'Email content',
      tabsize: 2,
      height: 100,
      minHeight: null,
      maxHeight: null,
      toolbar: null,
    });
    $('.dropdown-toggle').dropdown();
  });
</script>
<script>
  $(document).ready(function () {
    // Initialize Bloodhound for typeahead with email suggestions
    var useremails = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: {
        url: '/email', // Ensure this endpoint returns the expected array of email strings
        cache: false,
        filter: function(emails) {
          return $.map(emails, function(email) {
            return { name: email };
          });
        }
      }
    });

    useremails.initialize();

    // Initialize Tagsinput with Typeahead.js
    $('input[data-role="tagsinput"]').tagsinput({
      typeaheadjs: [{
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'useremails',
        displayKey: 'name',
        valueKey: 'name',
        source: useremails.ttAdapter()
      }]
    });

    // Check if items are being added correctly
    $('input[data-role="tagsinput"]').on('itemAdded', function(event) {
      //console.log('Item added:', event.item); // Log the added item to ensure it's captured
      $(this).tagsinput('refresh');  // Refresh tagsinput to ensure the items are properly displayed
    });
  });
</script>
@endpush