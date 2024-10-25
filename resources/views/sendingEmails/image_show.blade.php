<!-- Image Modal Structure -->
<div class="modal fade" id="imageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content image_preview">
            <div class="modal-header email_modal_header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close btn-btn-sm clos_btn2" data-bs-dismiss="modal" aria-label="Close"
                    data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Attachment Image" class="img-fluid" />
            </div>
        </div>
    </div>
</div>