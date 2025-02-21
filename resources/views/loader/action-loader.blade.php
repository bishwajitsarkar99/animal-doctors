{{-- start loader modal --}}
  <div class="modal fade" id="accessconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="access_modal_box">
        <div class="modal-body" id="processModal_body">
          <div class="" id="pageLoader" hidden>
            <img class="modal-loader" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
          </div> 
          <div class="progress ms-2" id="creatingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-creating" style="width:75%;"></div>
            <div class="progress-bar animation_creating_progress">Creating</div>
          </div>
          <div class="progress ms-2" id="updatingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-updating" style="width:75%;"></div>
            <div class="progress-bar animation_updating_progress">Updating</div>
          </div>
          <div class="progress ms-2" id="deletingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-deleting" style="width:75%;"></div>
            <div class="progress-bar animation_deleting_progress">Deleting</div>
          </div>
          <div class="progress ms-2" id="loadingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-processing" style="width:75%;"></div>
            <div class="progress-bar animation_progress">Loading</div>
          </div>
          <div class="progress ms-2" id="processingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-processing" style="width:75%;"></div>
            <div class="progress-bar animation_progress">Processing</div>
          </div>
          <div class="progress ms-2" id="dataPullingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-processing" style="width:75%;"></div>
            <div class="progress-bar animation_progress">Searching...</div>
          </div>
          <div class="progress ms-2" id="dataCheckingProgress" hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-processing" style="width:75%;"></div>
            <div class="progress-bar animation_progress">Checking...</div>
          </div>
        </div>  
      </div>
    </div>
  </div>
{{-- end loader modal --}}