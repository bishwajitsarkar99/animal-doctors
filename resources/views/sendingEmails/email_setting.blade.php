<div class="card-body focus-color cd skeleton email-setting-card">
    <form id="emailSetting">
        @csrf
        <div class="mail-setting-form">
            <input type="hidden" id="emailSettingID" />
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-group role_nme mb-3">
                        <span class="input-label"><label class="mail_label" for="mail-transport">Mail Transport</label></span>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_transport" id="emailTransport" placeholder="Email Transport" value="" />
                    </div>
                    <div class="form-group role_nme mb-3">
                        <label class="mail_label" for="mail-transport">Mail Host</label>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_host" id="emailHost" placeholder="Email Host" value=""/>
                    </div>
                    <div class="form-group role_nme mb-3">
                        <label class="mail_label" for="mail-transport">Mail Port</label>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_port" id="emailPort" placeholder="Email Port" value=""/>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group role_nme mb-3">
                        <label class="mail_label" for="mail-transport">User Name</label>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_username" id="emailUserName" placeholder="Email User Name" value="" />
                    </div>
                    <div class="form-group role_nme mb-3">
                        <label class="mail_label" for="mail-transport">Password</label>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_password" id="emailPassword" placeholder="Email Password" value=""/>
                    </div>
                    <div class="form-group role_nme mb-3">
                        <label class="mail_label" for="mail-transport">Mail Encryption</label>
                        <input class="form-control form-control-sm mail_input" type="text" name="mail_encryption" id="emailEncryption" placeholder="Email Encryption" value=""/>
                    </div>
                </div>
                <div class="form-group role_nme mb-2">
                    <label class="mail_label" for="mail-transport">Mail From</label>
                    <input class="form-control form-control-sm mail_input" type="text" name="mail_from" id="fromEmail" placeholder="From Email" value=""/>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 action_message">
                    <p class="mt-2 ps-1" id="mail_setting_success_messages"></p>
                    <span id="updateForm_errorList"></span>
                </div>
                <div class="col-xl-2" style="text-align:right;">
                    <button id="mailSettingUpdate" type="button" class="btn btn-sm btn-primary send_button button-skeleton mt-2">
                        <span class="loading-icon-setting spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="email-setting-btn-text">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>