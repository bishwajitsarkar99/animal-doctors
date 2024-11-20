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
                    { selector: '.selection, .inbox_clos_btn, .group_btn, .current_month, .input1, .input2, .input3, .input4, .input5, .custom-select, #user_email_get_data_table_paginate, .storg_inbox', type: 'class', name: 'text-skeletone' },
                    { selector: '.time_area', type: 'class', name: 'timzon-skeletone' },
                    { selector: '.group_btn', type: 'class', name: 'select-skeletone' },
                    { selector: '.email__select', type: 'class', name: 'min-dropdown-skeletone' },
                    { selector: '.next_btn', type: 'class', name: 'skeletone' },
                    { selector: '#email_data_table', type: 'class', name: 'tabskeletone' },
                    { selector: '.tot_summ', type: 'class', name: 'email-skeletone' },
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
                    {selector: '.send_selection,.send_clos_btn,.send_group_btn,.send_current_month,.send_input1,.send_input2,.send_input3,.send_input4,.send_input5,.send_timezone,.send_data_item,#send_email_data_table_paginate,.storg_send', type: 'class', name: 'text-skeletone'},
                    {selector: '.send__email__select', type: 'class', name: 'min-dropdown-skeletone'},
                    {selector: '.send_next_btn', type: 'class', name: 'skeletone'},
                    {selector: '#send_data_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.send_email_sum', type: 'class', name: 'email-skeletone'},
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
                    {selector: '.send_selection,.send_clos_btn,.send_group_btn,.send_current_month,.send_input1,.send_input2,.send_input3,.send_input4,.send_input5,.send_timezone,.draft_data_item,#draft_email_data_table_paginate,.storg_draft', type: 'class', name: 'text-skeletone'},
                    {selector: '.send__email__select', type: 'class', name: 'min-dropdown-skeletone'},
                    {selector: '.send_next_btn', type: 'class', name: 'skeletone'},
                    {selector: '#draft_data_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.draft_email_sum', type: 'class', name: 'email-skeletone'},
                    {selector: '.draft_email_progress', type: 'class', name: 'email-progress-bar-skeleton'},
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