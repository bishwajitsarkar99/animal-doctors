<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    
    $(document).ready(function(){
        // Email Inbox Tab
        $(document).on('click', '#v-pills-inbox-tab', function(e) {
            e.preventDefault();
            // Add skeleton classes
            addAttributeOrClass([
                { selector: '#email_data_table', type: 'class', name: 'tabskeletone' },
            ]);

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.selection, .inbox_clos_btn, .current_month, .input1, .input2, .input5, #user_email_get_data_table_paginate, .storg_inbox', type: 'class', name: 'text-skeletone' },
                    { selector: '.time_area', type: 'class', name: 'timzon-skeletone' },
                    { selector: ' .input3, .input_4', type: 'class', name: 'select-catg-skeletone' },
                    { selector: '.group_btn', type: 'class', name: 'select-skeletone' },
                    { selector: '.email__select', type: 'class', name: 'min-dropdown-skeletone' },
                    { selector: '.next_btn', type: 'class', name: 'refrsh-skeletone' },
                    { selector: '#email_data_table', type: 'class', name: 'tabskeletone' },
                    { selector: '.tot_summ', type: 'class', name: 'email-skeletone' },
                    {selector: '.custom-select', type: 'class', name: 'item-skeletone'},
                    { selector: '#cate_delete5', type: 'class', name: 'btn-skeletone' },
                    { selector: '.progress', type: 'class', name: 'progress-bar-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };
        });

        // Email Sendbox Tab
        $(document).on('click', '#v-pills-send-tab', function(e){
            e.preventDefault();

            addAttributeOrClass([
                {selector: '#send_data_table', type: 'class', name: 'tabskeletone'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.send_selection,.send_clos_btn,.send_group_btn,.send_current_month,.send_input1,.send_input2,.send_input5,.send_timezone,#send_email_data_table_paginate,.storg_send', type: 'class', name: 'text-skeletone'},
                    {selector: '.send__email__select', type: 'class', name: 'min-dropdown-skeletone'},
                    { selector: '.send_input3,.send_input4', type: 'class', name: 'select-catg-skeletone' },
                    {selector: '.send_next_btn', type: 'class', name: 'refrsh-skeletone'},
                    {selector: '#send_data_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.send_email_sum', type: 'class', name: 'email-skeletone'},
                    {selector: '.send_data_item', type: 'class', name: 'item-skeletone'},
                    {selector: '#send_list_cancel', type: 'class', name: 'btn-skeletone'},
                    {selector: '.send_email_progress', type: 'class', name: 'email-progress-bar-skeleton'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // Email Draft Tab
        $(document).on('click', '#v-pills-draft-tab', function(e){
            e.preventDefault();

            addAttributeOrClass([
                {selector: '#draft_data_table', type: 'class', name: 'tabskeletone'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.send_clos_btn,.draft_group_btn,.draft_email_current_month,.draft_input1,.draft_input2,.draft_input5,.send_timezone,#draft_email_data_table_paginate,.storg_draft', type: 'class', name: 'text-skeletone'},
                    {selector: '.draft__email__select', type: 'class', name: 'min-dropdown-skeletone'},
                    { selector: ' .draft_input3, .input4', type: 'class', name: 'select-catg-skeletone' },
                    {selector: '.draft_next_btn', type: 'class', name: 'refrsh-skeletone'},
                    {selector: '.draft_data_item', type: 'class', name: 'item-skeletone'},
                    {selector: '#draft_data_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.draft_email_sum', type: 'class', name: 'email-skeletone'},
                    {selector: '.draft_email_progress', type: 'class', name: 'email-progress-bar-skeleton'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // Email Record Tab
        $(document).on('click', '#v-pills-record-tab', function(e){
            e.preventDefault();

            addAttributeOrClass([
                {selector: '#email_record_table', type: 'class', name: 'tabskeletone'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.draft_current_month,.record_input_one,.record_input_two,.email_record_month,#user_email_record_table_paginate,.email_storg_record', type: 'class', name: 'text-skeletone'},
                    {selector: ' .record_input3, .record_input4, .record_input5', type: 'class', name: 'select-catg-skeletone' },
                    {selector: '.record_next_btn', type: 'class', name: 'refrsh-skeletone'},
                    {selector: '.record_data_item', type: 'class', name: 'item-skeletone'},
                    {selector: '#email_record_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.record_email_sum', type: 'class', name: 'email-skeletone'},
                    {selector: '.record_email_progress', type: 'class', name: 'email-progress-bar-skeleton'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // Email Setting Tab
        $(document).on('click', '#v-pills-permissions-tab', function(e){
            e.preventDefault();

            addAttributeOrClass([
                {selector: '#delete_permission_data_table', type: 'class', name: 'tabskeletone'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.draft_current_month,.record_input1,.record_input2,.record_current_month,#delete_email_data_table_paginate,.storg_record,#myTable', type: 'class', name: 'text-skeletone'},
                    { selector: ' .setting_input3, .setting_input4, .setting_input5, .setting_input6', type: 'class', name: 'select-catg-skeletone' },
                    {selector: '#PermissionCancel, #PermissionSubmit, #PermissionUpdate, #DataGet', type: 'class', name: 'setting-cancel-btn-skeletone'},
                    {selector: '.setting_data_item', type: 'class', name: 'setting-peritem-skeletone'},
                    {selector: '#delete_permission_data_table,.tb_head', type: 'class', name: 'tabskeletone'},
                    {selector: '.setting_email_sum', type: 'class', name: 'eml-skeletone'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // image modal skeletone
        $(document).on('click', '.attachment_file', function(){

            addAttributeOrClass([
                {selector: '.svg__doted', type: 'class', name: 'svg_skeletone'},
                {selector: '#showAttImage', type: 'class', name: 'hidden'},
                {selector: '.img_title, .img_close', type: 'class', name: 'text-skeletone'},
            ]);
            removeAttributeOrClass([
                {selector: '#imgSkeltone', type: 'class', name: 'hidden'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.svg__doted', type: 'class', name: 'svg_skeletone'},
                    {selector: '#showAttImage', type: 'class', name: 'hidden'},
                    {selector: '.img_title, .img_close', type: 'class', name: 'text-skeletone'},
                ]);
                addAttributeOrClass([
                    {selector: '#imgSkeltone', type: 'class', name: 'hidden'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });
        // file modal skeletone
        $(document).on('click', '#attfile_link_btn', function(){

            addAttributeOrClass([
                {selector: '.atth_close,.attach_header', type: 'class', name: 'text-skeletone'},
                {selector: '.attch_text,.atth_fl,.atth_fl2', type: 'class', name: 'text-skeletone'},
                {selector: '.logo_skeletone', type: 'class', name: 'logo-skeletone'},
                {selector: '.downloadBtn', type: 'class', name: 'link-btn-skeletone'},
            ]);
            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.atth_close,.attach_header', type: 'class', name: 'text-skeletone'},
                    {selector: '.attch_text,.atth_fl,.atth_fl2', type: 'class', name: 'text-skeletone'},
                    {selector: '.logo_skeletone', type: 'class', name: 'logo-skeletone'},
                    {selector: '.downloadBtn', type: 'class', name: 'link-btn-skeletone'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // File Directory modal
        $(document).on('click', '#file_directory_page', function(e){
            e.preventDefault();
            $("#fileDirectoryModal").modal('show');
        });
        // Setting Data get according to month
        $("#DataGet").on('click', function(e){
            e.preventDefault();
            $("#settingDataGetDateRange").modal('show');

            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.input_date,.input_date_two,.setting_title,.setting_close', type: 'class', name: 'text-skeletone'},
                    {selector: '#settingCancel', type: 'class', name: 'setting-cancel-btn-skeletone'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        

    });
</script>