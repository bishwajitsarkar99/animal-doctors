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
    });
</script>