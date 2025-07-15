<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
  <div id="{{ $tostarId }}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-deep-purple text-white">
      <strong class="me-auto">Success</strong>
      <small class="text-white">Now</small>
      <button type="button" class="btn-close btn-close-white" style="box-shadow: none;outline: none;" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body bg-deep-purple text-white" id="{{ $messageId }}">
      <!-- Dynamic success message will be inserted here -->
    </div>
  </div>
</div>