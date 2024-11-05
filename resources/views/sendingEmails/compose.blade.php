<div class="card-body focus-color cd skeleton" style="border:1px solid lightgray;border-radius: 5px;margin-bottom: 10px;">
    <form id="emailForm" action="{{route('email.send')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <span id="emailForwardID" hidden></span>
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
        <div class="form-group mb-1">
            <textarea class="form-control form-control-sm main_content" id="email_summernote" name="main_content" cols="30" rows="10" placeholder="Email Content"></textarea>
        </div>
        <div class="row">
            <div class="col-xl-12">
            <table>
                <thead>
                <tr>
                    <th class="file-head">
                    <span class="more__button">
                        <select type="text" class="form-control form-control-sm" name="attachment_type" id="selectAttachFile">
                            <option value="" >Select Attachment Type</option>
                            <option value="attachments">Management Report</option>
                            <option value="user_message">User Message</option>
                            <option value="other">Others</option>
                        </select>
                    </span>
                    </th>
                    <th class="file-head">
                    <span class="more__button">
                        <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="clearBtn" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Clear Form" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                        <i class="fa-solid fa-ban fa-beat" style="color:orangered;"></i>
                        </button>
                    </span>
                    </th>
                    <th class="file-head">
                    Add Attach File
                    <span class="more__button">
                        <button class="btn btn-group-sm" id="moreBtn" disabled type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Row" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                        <span style="font-size:20px;color:#0056b3;"><i class="fa-solid fa-circle-plus"></i></span>
                        </button>
                    </span>
                    </th>
                    <th class="file-head">
                    Remove Attach File
                    <span class="more__button">
                        <button class="btn btn-group-sm" id="decrementBtn" disabled type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove Row" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                        <span style="font-size:20px;color:orangered;"><i class="fa-solid fa-circle-minus"></i></span>
                        </button>
                    </span>
                    </th>
                </tr>
                </thead>
                <tbody id="fileTable">
                <tr class="file-row">
                    <td class="file-column" colspan="3">
                    <input type="file" class="form-control form-control-sm attachment hidden" name="email_attachments[]" id="email_attachment" multiple />
                    </td>
                    <td class="file-column"></td>
                </tr>
                </tbody>
            </table>
            <!-- Attachments loaded via AJAX will be displayed here -->
            <div class="row mt-1">
                <div id="attachmentPreview"></div>
            </div>
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