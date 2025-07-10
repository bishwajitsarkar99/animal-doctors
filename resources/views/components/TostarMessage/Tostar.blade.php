<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
  <div id="{{ $tostarId }}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-white text-success">
      <strong class="me-auto">Success</strong>
      <small class="text-success">Now</small>
      <button type="button" class="btn-close btn-close-success" style="box-shadow: none;outline: none;" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body bg-white text-success" id="{{ $messageId }}">
      <!-- Dynamic success message will be inserted here -->
    </div>
  </div>
</div>