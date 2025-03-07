<script>
    $(document).ready(function() {
        $('#static_nav').click(function(event) {
            event.preventDefault();
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');

            // folder-name dropdown menu
            $('#folderSelect').removeClass('is-valid');
            $('#folderSelect').addClass('border-color-light');
            $('#search_error').empty();
            $('#search_error').removeClass("alert_show_errors ps-1");
            // updload-folder dropdown menu
            $('#folder').removeClass('is-invalid');
            $('#folder').removeClass('is-valid');
            $('#folder').addClass('border-color-light');
            $('#upload_error').empty();
            $('#upload_error').removeClass("alert_show_errors ps-1");
            // chose-file
            $('#file').removeClass('is-invalid');
            $('#file').removeClass('is-valid');
            $('#file').addClass('border-color-light');
            $('#upload_error2').empty();
            $('#file').val("");
            $('#upload_error2').removeClass("alert_show_errors ps-1");
            // input field
            $('#savForm_validation').html("");
            $('#savForm_validation').removeClass("alert_show_errors");
            $('#folderName').removeClass('is-invalid');
            $('#folderName').removeClass('is-valid');
            $("#folderName").addClass('border-color-light');
            // search file
            $("#filesSelect").html("");
            // Table
            $("#myFolderTable").addClass('table-display-hidden');
            $("#tableCheck").prop('checked', false);
            $("#uploadedFilesList").html("");
            setTimeout(() => {
                requestAnimationFrame(() => {
                    $("#accessconfirmbranch").modal('hide');
                    $("#pageLoader").attr('hidden', true);
                    $("#access_modal_box").removeClass('loader_area');
                    $("#processModal_body").addClass('loading_body_area');
    
                    $('#fileModal').modal('show').fadeIn(300).delay(300);
                    fetchFolders();
                    fetch_get_folder();
        
                    // Modal Header
                    $("#fileMang").addClass('filemanager-skeletone');
                    $("#fileModalLabel").removeClass('flmangname_skeletone');
                    $("#galleryImage").addClass('gallery-image-skeletone');
                    $("#imageGally").addClass('gallery-image-display');
                    $("#svgFolderIcon").addClass('file-card-svg-skeletone');
                    $("#srchbarskle").addClass('input_search_bar_skeletone');
                    $("#srch_name").addClass('search-bar-display');
                    // Modal body
                    $("#inputFieldOne").addClass('input_field_one_skeletone');
                    $("#folderName").addClass('input_field_one_display');
                    $("#labelSkele").addClass('input_labels_skeletone');
                    $("#lab_disp").removeClass('lb-display');
                    $("#newBtnMode").addClass('new_btn_skeletone');
                    $("#createFolderBtn").attr('hidden', true);
                    $("#fldSkele").addClass('input_labels_skeletone');
                    $("#lbNme").removeClass('select_lb_display');
                    $("#inputFieldTwo").addClass('input_field_two_skeletone');
                    $("#folder").addClass('select_display');
                    $("#inputFieldThree").addClass('input_field_three_skeletone');
                    $("#file").addClass('file_display');
                    $("#uploadBtnMode").addClass('upload_btn_skeletone');
                    $("#uploadBtn").addClass('upload_btn_display');
                    // search files
                    $("#fldSkeletone").addClass('folder-serch-skeletone');
                    $("#uploadLab").removeClass('upload_lbel_display');
                    $("#selectField").addClass('select_field_skeletone');
                    $("#folderSelect").addClass('select_lbel_display');
                    $("#srchBtnMode").addClass('searh_btn_skeletone');
                    $("#searchFile").addClass('srh_lbel_display');
                    $("#backgroundColor").removeClass('src-bg');
                    $("#showFolderIcon").addClass('folder-svg-display');
                    $("#searFolder").addClass('display-parg');
                    $("#svgIn").removeClass('svg-icon');
                    $("#showFolderIcon").removeClass('icon_group');
                    $("#srcFolder").addClass('folder_name_skeletone');
                    $("#srcFolder").removeClass('flname_skeletone');
                    $(".show__table").addClass('show__table__display');
                    $(".btn__close").addClass('skeleton');

                });
    
                setTimeout(() => {
                    requestAnimationFrame(() => {
                        // Modal Header
                        $("#fileMang").removeClass('filemanager-skeletone');
                        $("#fileModalLabel").addClass('flmangname_skeletone');
                        $("#srchbarskle").removeClass('input_search_bar_skeletone');
                        $("#srch_name").removeClass('search-bar-display');
                        $(".show__table").removeClass('show__table__display');
        
                        // Modal body
                        $("#inputFieldOne").removeClass('input_field_one_skeletone');
                        $("#folderName").removeClass('input_field_one_display');
                        $("#labelSkele").removeClass('input_labels_skeletone');
                        $("#lab_disp").addClass('lb-display');
                        $("#newBtnMode").removeClass('new_btn_skeletone');
                        $("#createFolderBtn").removeAttr('hidden');
                        $("#fldSkele").removeClass('input_labels_skeletone');
                        $("#lbNme").addClass('select_lb_display');
                        $("#inputFieldTwo").removeClass('input_field_two_skeletone');
                        $("#folder").removeClass('select_display');
                        $("#inputFieldThree").removeClass('input_field_three_skeletone');
                        $("#file").removeClass('file_display');
                        $("#uploadBtnMode").removeClass('upload_btn_skeletone');
                        $("#uploadBtn").removeClass('upload_btn_display');
        
                        //search-files
                        $("#fldSkeletone").removeClass('folder-serch-skeletone');
                        $("#uploadLab").addClass('upload_lbel_display');
                        $("#selectField").removeClass('select_field_skeletone');
                        $("#folderSelect").removeClass('select_lbel_display');
                        $("#srchBtnMode").removeClass('searh_btn_skeletone');
                        $("#searchFile").removeClass('srh_lbel_display');
                        $("#backgroundColor").addClass('src-bg');
                        $("#galleryImage").removeClass('gallery-image-skeletone');
                        $("#imageGally").removeClass('gallery-image-display');
                        $("#svgFolderIcon").removeClass('file-card-svg-skeletone');
                        $("#showFolderIcon").removeClass('folder-svg-display');
                        $("#searFolder").removeClass('display-parg');
                        $("#svgIn").addClass('svg-icon');
                        $("#showFolderIcon").addClass('icon_group');
                        $("#srcFolder").removeClass('folder_name_skeletone');
                        $("#srcFolder").addClass('flname_skeletone');
                        $(".btn__close").removeClass('skeleton');

                    });
                }, 2000);
            }, 1500);
        });
        
        // search folder
        $(document).on('keyup', '#srch_name', function() {
            $(this).toggleClass('srch_bg');
        });
        // Delete File
        $(document).on('click', '.delete-file', function(e) {
            e.preventDefault();

            var filename = $(this).data('filename');

            $.ajax({
                type: 'DELETE',
                url: '{{ url("file-manager/delete") }}/' + filename,
                success: function(response) {
                    // Refresh file list after delete
                    fetchFiles();
                    alert(response.success);
                }
            });
        });
        // Input Field Handel
        $(document).on('keyup', '#folderName', function(){
            var value = $(this).val();
            if(value !==''){
                $('#folderName').removeClass('is-invalid');
                $('#folderName').addClass('is-valid');
                $("#folderName").removeClass('border-color-light');
                $('#savForm_validation').html("");
            }else if(value ==''){
                $('#folderName').removeClass('is-invalid');
                $('#folderName').removeClass('is-valid');
                $("#folderName").addClass('border-color-light');
            }
        });
        // Create Folder
        $(document).on('click', '#createFolderBtn', function(e) {
            e.preventDefault();
            // input
            $('#folderName').removeClass('is-invalid');
            $('#folderName').removeClass('is-valid');
            $('#folderName').addClass('border-color-light');
            // folder-name dropdown menu
            $('#folderSelect').removeClass('is-invalid');
            $('#folderSelect').removeClass('is-valid');
            $('#folderSelect').addClass('border-color-light');
            $('#search_error').removeClass("alert_show_errors ps-1");
            $('#search_error').empty();
            // updload-folder dropdown menu
            $('#folder').removeClass('is-invalid');
            $('#folder').removeClass('is-valid');
            $('#folder').addClass('border-color-light');
            $('#upload_error').removeClass("alert_show_errors ps-1");
            $('#upload_error').empty();
            // chose file
            $('#file').removeClass('is-invalid');
            $('#file').removeClass('is-valid');
            $('#file').addClass('border-color-light');
            $('#upload_error2').removeClass("alert_show_errors ps-1");
            $('#upload_error2').empty();
            $('#file').val("");

            var data = {
                'folder_name': $('#folderName').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('file-manager.create-folder')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_validation').html("");
                            $('#savForm_validation').addClass('alert_show_errors');
                            $('#savForm_validation').append('<span class="">' + err_value + '</span>');
                            $('#savForm_validation').fadeIn();
                            $('#folderName').addClass('is-invalid');
                        });
                    } else {
                        $('#savForm_validation').html("");
                        $('#successMessage').html("");
                        $('#successMessage').addClass('alert_show ps-1 pe-1');
                        $('#successMessage').fadeIn();
                        $('#successMessage').text(response.messages);
                        $('#folderName').val("");
                        setTimeout(() => {
                            requestAnimationFrame(() => {
                                $('#successMessage').fadeOut();
                            });
                        }, 3000);
                    }
                    fetch_folder_data();
                    fetchFolders();
                    fetch_get_folder();
                }
            });
        });
        // Get Folder Data Fetch
        fetch_folder_data();
        // Dropdown Data Fetch
        fetchFolders();
        // Dropdown Select Folder for view
        fetch_get_folder();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Folder Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }
            return [...rows].map((row, key) => {
                return `
                    <tr class="user-table-row" style="font-weight:600;background: white;" id="cat_td" key="${key}">
                        <td class="sn border_ord" id="cat_td2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="cat_td3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd mb-1" style="margin-top: 3px;" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action mini-box ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtnFolder" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip"  data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtnFolder" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip"  data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                                <span class="action-box-arrow mini"></span>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="cat_td4">${row.folder_name}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // Fetch Folder Data ------------------
        function fetch_folder_data(query = '') {
            var current_url = "{{ route('folder.fetchFolder')}}";
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: current_url,
                data: {
                    query: query
                },
                success: function(response) {
                    $("#folder_data_table").html(table_rows(response.data));
                    // Initialize tooltips after appending the elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        // Live-Search-----------------------------
        $(document).on('keyup', '#srch_name', function() {
            var query = $(this).val();
            if(query !==''){
                $("#myFolderTable").removeClass('table-display-hidden');
                $("#tableCheck").prop('checked', true);
            }else{
                $("#myFolderTable").addClass('table-display-hidden');
                $("#tableCheck").prop('checked', false);
            }
            fetch_folder_data(query);
        });
        // Refresh
        $(document).on('click', '#refresh', function(){
            $('.bf').addClass('refresh');
            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.bf').removeClass('refresh');
                });
            }, 2000);
            // folder-name dropdown menu
            $('#folderSelect').removeClass('is-select');
            $('#folderSelect').addClass('border-color-light');
            $('#search_error').empty();
            // updload-folder dropdown menu
            $('#folder').removeClass('is-invalid');
            $('#folder').removeClass('is-valid');
            $('#folder').addClass('border-color-light');
            $('#upload_error').empty();
            // chose-file
            $('#file').removeClass('is-invalid');
            $('#file').removeClass('is-valid');
            $('#file').addClass('border-color-light');
            $('#upload_error2').empty();
            $('#file').val("");
            // input field
            $('#savForm_validation').html("");
            $('#folderName').removeClass('is-invalid');
            $('#folderName').removeClass('is-valid');
            $("#folderName").addClass('border-color-light');
            // clear error
            $('#savForm_validation').removeClass("alert_show_errors");
            $('#search_error').removeClass("alert_show_errors ps-1");
            $('#upload_error').removeClass("alert_show_errors ps-1");
            $('#upload_error2').removeClass("alert_show_errors ps-1");
            $("#folderName").addClass('border-color-light');
            // search file
            $("#filesSelect").html("");
            $("#uploadedFilesList").html("");
            fetch_folder_data();
            fetchFolders();
            fetch_get_folder();
        });
        // show table
        $(document).on('click', '#tableCheck', function() {
            if($(this).is(':checked')){
                $("#myFolderTable").removeClass('table-display-hidden').show('slow');
            } else {
                $("#myFolderTable").addClass('table-display-hidden').hide('slow');
            }
        });
        // Edit Folder Name
        $(document).on('click', '#edtBtnFolder', function(event) {
            event.preventDefault();
            $("#createFolderBtn").attr('hidden', true);
            $("#createFolderBtn").fadeOut();
            $("#updateFolderBtn").removeAttr('hidden');
            $("#updateFolderBtn").fadeIn();
            $("#cancelFolderBtn").removeAttr('hidden');
            $("#cancelFolderBtn").fadeIn();
            $(".edit_folder_name").addClass('update-folder-name');
            var folder_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/file-manager/edit-folders/" + folder_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#successMessage').html("");
                        $('#successMessage').addClass('alert alert-danger');
                        $('#successMessage').text(response.messages);
                    } else {
                        $('#folder_id').val(folder_id);
                        $('.edit_folder_name').val(response.messages.folder_name);
                    }
                }
            });
        });
        // Update Folder Name
        $(document).on('click', '#updateFolderBtn', function(e) {
            e.preventDefault();
            // input
            $('#folderName').removeClass('is-invalid');
            $('#folderName').removeClass('is-valid');
            $('#folderName').addClass('border-color-light');

            $("#createFolderBtn").removeAttr('hidden');
            $(this).hide('slow');
            $("#cancelFolderBtn").attr('hidden', true);

            var folder_id = $('#folder_id').val();
            var data = {
                'folder_name': $('.edit_folder_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/file-manager/update-folders/" + folder_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_validation').html("");
                            $('#updateForm_validation').addClass('alert_show_errors ps-1 pe-1');
                            $('#updateForm_validation').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_validation').html("");
                        $('#successMessage').addClass('alert_show ps-1 pe-1');
                        $('#successMessage').text(response.messages);
                    } else {
                        $('#updateForm_validation').html("");
                        $('#successMessage').html("");
                        $('#successMessage').addClass('alert_show ps-1 pe-1');
                        $('#successMessage').fadeIn();
                        $('#successMessage').text(response.messages);
                        $('.edit_folder_name').val("");
                        setTimeout(() => {
                            requestAnimationFrame(() => {
                                $('#successMessage').fadeOut();
                            });
                        }, 3000);
                    }
                    fetch_folder_data();
                    fetchFolders();
                    fetch_get_folder();
                }
            });

        });
        // Delete Folder 
        $(document).on('click', '#deleteBtnFolder', function(event) {
            event.preventDefault();
            var folder_id = $(this).val();
            $("#delete_folder_id").val(folder_id);
            $("#deleteFolder").modal('show');
        });
        $(document).on('click', '.delet_btn_folder', function(e) {
            e.preventDefault();
            var folder_id = $('#delete_folder_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/file-manager/folder-delete/" + folder_id,
                success: function(response) {
                    $('#successMessage').addClass('alert_show ps-1 pe-1');
                    $('#successMessage').fadeIn();
                    $('#successMessage').text(response.messages);
                    setTimeout(() => {
                        requestAnimationFrame(() => {
                            $('#successMessage').fadeOut();
                        });
                    }, 3000);
                    $('#deleteFolder').modal('hide');

                    fetch_folder_data();
                    fetchFolders();
                    fetch_get_folder();
                }

            });
        });
        // Cancel Edit
        $(document).on('click', '#cancelFolderBtn', function() {
            $("#createFolderBtn").removeAttr('hidden');
            $("#createFolderBtn").fadeIn();
            $("#updateFolderBtn").attr('hidden', true);
            $("#updateFolderBtn").fadeOut();
            $("#cancelFolderBtn").attr('hidden', true);
            $("#cancelFolderBtn").fadeOut();
            $("#folderName").val("");
        });
        // File Upload AJAX Request
        $('#uploadBtn').on('click', function() {
            $('#upload_error').empty();
            $('#upload_error2').empty();
            $('#successMessage').html("");
            var folderName = $('#folder').val();

            var fileInput = $('#file')[0];
            var files = fileInput.files;
            var formData = new FormData();

            for (var i = 0; i < files.length; i++) {
                formData.append('file', files[i]);
            }
            formData.append('folder_name', folderName);

            $.ajax({
                url: "{{ route('upload.file') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#uploadedFilesList').empty();
                    $('#filesSelect').empty();
                    if (response.status == 200) {
                        $('#folderSelect').removeClass('is-select');
                        $('#folderSelect').addClass('border-color-light');
                        $('#search_error').empty();
                        $('#search_error').removeClass('alert_show_errors ps-1');
                        $('#folder').removeClass('is-invalid');
                        $('#folder').removeClass('is-valid');
                        $('#folder').addClass('border-color-light');
                        $('#file').removeClass('is-invalid');
                        $('#file').removeClass('is-valid');
                        $('#file').addClass('border-color-light');
                        // alert(response.success);
                        $('#successMessage').addClass('alert_show ps-1 pe-1');
                        $('#successMessage').fadeIn();
                        $('#successMessage').text(response.messages);
                        $('#folder').val("");
                        $('#file').val("");
                        setTimeout(() => {
                            requestAnimationFrame(() => {
                                $('#successMessage').fadeOut();
                            });
                        }, 3000);
                    } else if (response.status == 404) {
                        // alert(response.error);
                        $('#upload_error').html("");
                        $('#upload_error').addClass('alert_show_errors ps-1 pe-1');
                        $('#upload_error2').html("");
                        $('#upload_error2').addClass('alert_show_errors ps-1 pe-1');
                        $.each(response.errors, function(key, err_value) {
                            $('#upload_error').append('<span>' + err_value + '</span>');
                            $('#upload_error2').append('<span>' + err_value + '</span>');
                        });
                    } else if(response.status == 409){
                        $('#successMessage').addClass('alert_show ps-1 pe-1');
                        $('#successMessage').fadeIn();
                        $('#successMessage').text(response.messages);
                    }
                    setTimeout(() => {
                        requestAnimationFrame(() => {
                            $('.svg__doted').removeClass('svg_skeletone');
                            $('.dispay__svg').addClass('display-hidden');
                            $('.image').removeClass('image-display');
                        });
                    }, 3000);
                    fetchFiles();
                },
                error: function(xhr) {
                    console.error(xhr);
                    $('#upload_error').addClass('alert_show_errors ps-1');
                    $('#upload_error').append('<span>Select folder</span>');
                    $('#upload_error2').addClass('alert_show_errors ps-1');
                    $('#upload_error2').append('<span>Choose a file</span>');
                    $('#folder').addClass('is-invalid');
                    $('#file').addClass('is-invalid');
                }
            });

        });

        // Folder Select Handel
        $(document).on('change', '#folder', function(){
            var value = $(this).val();
            $('#upload_error').empty();
            $('#upload_error').removeClass('alert_show_errors ps-1');
            if(value !==''){
                $('#folder').removeClass('is-invalid');
                $('#folder').addClass('is-valid');
                $('#folder').removeClass('border-color-light');
            }else{
                $('#folder').removeClass('is-invalid');
                $('#folder').removeClass('is-valid');
                $('#folder').addClass('border-color-light');
            }
        });

        // Choose File Handel
        $(document).on('change', '#file', function(){
            var value = $(this).val();
            $('#upload_error2').empty();
            $('#upload_error2').removeClass('alert_show_errors ps-1');
            if(value !==''){
                $('#file').removeClass('is-invalid');
                $('#file').addClass('is-valid');
                $('#file').removeClass('border-color-light');
            }else{
                $('#file').removeClass('is-invalid');
                $('#file').removeClass('is-valid');
                $('#file').addClass('border-color-light');
            }
        });

        // Folder Select Handel for search
        $(document).on('change', '#folderSelect', function(){
            var value = $(this).val();
            $('#search_error').empty();
            $('#search_error').removeClass('alert_show_errors ps-1');
            if(value !==''){
                $('#folderSelect').addClass('is-select');
                $('#folderSelect').removeClass('border-color-light');
            }else{
                $('#folderSelect').removeClass('is-select');
                $('#folderSelect').addClass('border-color-light');
            }
        });

        // Fetch Folder Name
        function fetchFolders() {
            $.ajax({
                type: 'GET',
                url: '{{ route("folder.getFolder") }}',
                success: function(response) {
                    $('#folder').empty();
                    $('#folder').append('<option value="" disabled selected>Select Folder</option>');
                    $.each(response.folders, function(index, folder) {
                        $('#folder').append(
                            '<option value="' + folder.folder_name + '" target="_blank">' + folder.folder_name + '</option>'
                        );
                    });
                },
                error: function(xhr) {
                    alert('Error fetching folders.');
                }
            });
        }
        // Fetch Folder Name For File Searching---------
        function fetch_get_folder() {
            $.ajax({
                type: 'GET',
                url: '{{ route("getFolder.action") }}',
                success: function(response) {
                    $('#folderSelect').empty();
                    $('#folderSelect').append('<option value="" disabled selected>Select Folder</option>');
                    $.each(response.folders, function(index, folder) {
                        $('#folderSelect').append(
                            '<option value="' + folder.folder_name + '" target="_blank">' + folder.folder_name + '</option>'
                        );
                    });
                },
                error: function(xhr) {
                    alert('Error fetching folders.');
                }
            });
        }
        // Event handler for the searchFile button
        $(document).on('click', '#searchFile', function() {
            $('#uploadedFilesList').empty();
            var value = $('#folderSelect').val();
            if(value !==''){
                $('#search_error').removeClass('alert_show_errors ps-1');
                $('#folderSelect').addClass('is-select');
                $('#folderSelect').removeClass('border-color-light');
                $('#search_error').empty();
                $('#filesSelect').empty();
            }
            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.svg__doted').removeClass('svg_skeletone');
                    $('.dispay__svg').addClass('display-hidden');
                    $('.image').removeClass('image-display');
                });
            }, 3000);
            fetchFiles();
        });
        // Declare a global variable to store the image URL
        var selectedImageUrl = "";

        // Attach click event to "Select" button in the file manager
        $(document).on("click", ".link_button", function () {
            selectedImageUrl = $(this).attr('data-image-url');
            
            // Set the image view source using the globally stored URL
            $("#image_view").attr('src', selectedImageUrl);
            $("#fileModal").modal('hide');
            
            // Update the hidden input with the selected image URL to be sent to the backend
            $('#imgInput').val(selectedImageUrl); // Set the input value to the image URL
        });
        // Fetch Folder Name and Files
        function fetchFiles() {
            var selectedFolder = document.getElementById("folderSelect").value;
            var baseUrl = "/uploads/";
            $.ajax({
                type: 'GET',
                url: "/files/" + selectedFolder,
                success: function(response) {
                    var folderName = response.folder;
                    $("#filesSelect").append('<span class="ms-2"> ' + folderName + ' </span>');

                    if (response.files.length === 0) {
                        $('#uploadedFilesList').append('<div class="font_search" role="alert">No files found from the selected folder.</div>');
                        return;
                    }

                    $.each(response.files, function(index, file) {
                        var fileLink = baseUrl + selectedFolder + '/' + file;
                        var imageSrc = baseUrl + selectedFolder + '/' + file;

                        $('#uploadedFilesList').append(`
                            <div class="col-2" index="${index}">
                                <div class="upload_image__box card form-control form-control-sm file-card mt-2 mb-2">
                                    <div class="file-area">
                                        <div class="svg__doted svg_skeletone dispay__svg" id="fileSkeltone">
                                            <svg id="svg_mode" style="width:6em;height:6em;" viewBox="0 0 1024 1024" class="icon popular-svg" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M878.3 192.9H145.7c-16.5 0-30 13.5-30 30V706c0 16.5 13.5 30 30 30h732.6c16.5 0 30-13.5 30-30V222.9c0-16.5-13.5-30-30-30z" fill="#FFFFFF" />
                                                <path d="M145.7 736h732.6c16.5 0 30-13.5 30-30v-22.1H115.7V706c0 16.6 13.5 30 30 30z" fill="#f3f3f3" />
                                                <path d="M878.3 152.9H145.7c-38.6 0-70 31.4-70 70V706c0 38.6 31.4 70 70 70h732.6c38.6 0 70-31.4 70-70V222.9c0-38.6-31.4-70-70-70z m30 531V706c0 16.5-13.5 30-30 30H145.7c-16.5 0-30-13.5-30-30V222.9c0-16.5 13.5-30 30-30h732.6c16.5 0 30 13.5 30 30v461zM678 871.1H346c-11 0-20-9-20-20s9-20 20-20h332c11 0 20 9 20 20s-9 20-20 20z" fill="lightgray" />
                                                <path d="M127.1 662.7c-2.7 0-5.4-1.1-7.3-3.2-3.7-4.1-3.5-10.4 0.6-14.1l236.5-219.6L463 541.9l258.9-290.7 183.7 196.3c3.8 4 3.6 10.4-0.4 14.1-4 3.8-10.3 3.6-14.1-0.4L722.3 280.8l-259 290.9L355.7 454 133.9 660c-2 1.8-4.4 2.7-6.8 2.7z" fill="lightgray" />
                                                <path d="M156.4 541.9a82.7 82.8 0 1 0 165.4 0 82.7 82.8 0 1 0-165.4 0Z" fill="#f3f3f3" />
                                                <path d="M179.8 541.9a59.3 59.3 0 1 0 118.6 0 59.3 59.3 0 1 0-118.6 0Z" fill="lightgray" />
                                                <path d="M208.9 541.9a30.2 30.3 0 1 0 60.4 0 30.2 30.3 0 1 0-60.4 0Z" fill="#f3f3f3" />
                                                <path d="M580.9 329.9a82.7 82.8 0 1 0 165.4 0 82.7 82.8 0 1 0-165.4 0Z" fill="#f1f1f1" />
                                                <path d="M604.3 329.9a59.3 59.3 0 1 0 118.6 0 59.3 59.3 0 1 0-118.6 0Z" fill="lightgray" />
                                                <path d="M633.4 329.9a30.2 30.3 0 1 0 60.4 0 30.2 30.3 0 1 0-60.4 0Z" fill="white" />
                                                <path d="M719.3 539.6a46.3 46.4 0 1 0 92.6 0 46.3 46.4 0 1 0-92.6 0Z" fill="lightgray" />
                                                <path d="M732.4 539.6a33.2 33.2 0 1 0 66.4 0 33.2 33.2 0 1 0-66.4 0Z" fill="lightgray" />
                                                <path d="M748.7 539.6a16.9 17 0 1 0 33.8 0 16.9 17 0 1 0-33.8 0Z" fill="white" />
                                                <path d="M436.8 720.1H275.2c-5 0-9-4-9-9s4-9 9-9h161.6c5 0 9 4 9 9 0 4.9-4.1 9-9 9zM220.6 720.1h-26.5c-5 0-9-4-9-9s4-9 9-9h26.5c5 0 9 4 9 9 0 4.9-4.1 9-9 9z" fill="#FFFFFF" />
                                            </svg>
                                        </div>
                                        <div class="image-display image" id="imageOpen">
                                            <p class="mt-1">
                                                <img src="${imageSrc}" alt="${file}" id="image_hover">
                                            </p>
                                            <div class="btn__icon img__btn__icon">
                                                <a type="button" class="btn btn-success btn-sm link_button" data-image-url="${fileLink}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                                    <i class="fa-solid fa-link" style="font-size:10px;"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm delete-file" data-file="${file}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                                    <i class="fa-solid fa-trash-can" style="font-size:10px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        `);
                    });
                    // Initialize tooltips after appending the elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                error: function(xhr) {
                    console.error(xhr);
                    $('#folderSelect').addClass('is-select');
                    $('#folderSelect').removeClass('border-color-light');
                }
            });
        }
        // Event handler for file deletion
        $(document).on('click', '.delete-file', function() {
            var fileName = $(this).data('file');
            var selectedFolder = document.getElementById("folderSelect").value;
            var deleteButton = $(this);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'DELETE',
                url: "/file-manager/delete/" + selectedFolder + "/" + fileName,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    $('#uploadedFilesList').empty();
                    $('#filesSelect').empty();
                    deleteButton.closest('.file-card').remove();
                    $('#successMessage').addClass('alert_show ps-1 pe-1');
                    $('#successMessage').fadeIn();
                    $('#successMessage').text(response.messages);
                    setTimeout(() => {
                        requestAnimationFrame(() => {
                            $('.svg__doted').removeClass('svg_skeletone');
                            $('.dispay__svg').addClass('display-hidden');
                            $('.image').removeClass('image-display');
                            $('#successMessage').fadeOut();
                        });
                    }, 3000);
                    fetchFiles();
                }
            });
        });
    });
</script>
<!-- File-Manager Loader Design -->
<script>
    $(document).ready(function() {
        // Search-Button loader
        $("#searchFile").on('click', () => {
            $('.search-icon').removeClass('search-hidden');
            $(this).attr('disabled', true);

            $(".search-fold").addClass('search-classic');

            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.search-icon').addClass('search-hidden');
                    $(this).attr('disabled', false);
                    $(".search-fold").removeClass('search-classic');
                });
            }, 1000);
        });
        // Upload-Button loader
        $("#uploadBtn").on('click', () => {
            $('.upload-icon').removeClass('upload-hidden');
            $(this).attr('disabled', true);

            $(".upload-btn").addClass('upload-classic');

            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.upload-icon').addClass('upload-hidden');
                    $(this).attr('disabled', false);
                    $(".upload-btn").removeClass('upload-classic');
                });
            }, 1000);
        });
        // Create-Button loader
        $("#createFolderBtn").on('click', () => {
            $('.create-icon').removeClass('create-hidden');
            $(this).attr('disabled', true);

            $(".create-btn").addClass('create-classic');
            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.create-icon').addClass('create-hidden');
                    $(this).attr('disabled', false);
                    $(".create-btn").removeClass('create-classic');
                });
            }, 1000);
        });
        // update-folder loader
        $("#updateFolderBtn").on('click', () => {
            $('.update-folder-icon').removeClass('update-folder-hidden');
            $(this).attr('disabled', true);

            $(".update-btn").addClass('update-classic');

            setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.update-folder-icon').addClass('update-folder-hidden');
                    $(this).attr('disabled', false);
                    $(".update-btn").removeClass('update-classic');
                });
            }, 1000);
        });
    });
</script>