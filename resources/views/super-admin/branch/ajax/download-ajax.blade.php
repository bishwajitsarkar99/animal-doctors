<script>
    $(document).ready(function(){
        // ===========================
        // Export PDF
        // ===========================
        $(document).on('click', '#exportPDF', function(e){
            e.preventDefault();
            const branch_type = $("#selectBranchCategories").val() || '';
            
            const query = $("#search").val() || '';

            const url = '{{ route("branch_pdf_download.action") }}' + 
            '?branch_type=' + encodeURIComponent(branch_type) + 
            '&query=' + encodeURIComponent(query);

            window.location.href = url;
        });

        // ===========================
        // Export Excel
        // ===========================
        $(document).on('click', '#exportExcel', function(e){

            e.preventDefault();
            const branch_type = $("#selectBranchCategories").val() || '';
            
            const query = $("#search").val() || '';

            const url = '{{ route("branch-record_excel.action") }}' + 
            '?branch_type=' + encodeURIComponent(branch_type) + 
            '&query=' + encodeURIComponent(query);

            window.location.href = url;
        });

        // ===========================
        // Export Excel CSV Format
        // ===========================
        $(document).on('click', '#exportCsv', function(e){

            e.preventDefault();
            const branch_type = $("#selectBranchCategories").val() || '';
            
            const query = $("#search").val() || '';

            const url = '{{ route("branch-record_cvs_file.action") }}' + 
            '?branch_type=' + encodeURIComponent(branch_type) + 
            '&query=' + encodeURIComponent(query);

            window.location.href = url;
        });
    });
</script>