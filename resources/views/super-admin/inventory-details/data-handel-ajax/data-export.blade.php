<script>
    $(document).ready(function(){
        // PDF format
        //&#2547;
        $(document).on('click', '#export', function(e){
            e.preventDefault();

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const supplier_id = $("#select_supplier_id").val();
            const user_id = $("#select_user_id").val();
            const status = $("#select_status").val();
            const medicine_group = $("#select_medicine_group").val();
            const medicine_dosage = $("#select_medicine_dosage").val();
            const medicine_origin = $("#select_medicine_origin").val();
            const medicine_name = $("#select_medicine_name").val();
            const inv_id = $("#input_inventory_search").val();

            const url = '{{ route("inventory-details-record_pdf.action") }}?' +
                `start_date=${start_date}&end_date=${end_date}&user_id=${user_id}&inv_id=${inv_id}&status=${status}` +
                `&supplier_id=${supplier_id}&medicine_group=${medicine_group}&medicine_dosage=${medicine_dosage}` +
                `&medicine_origin=${medicine_origin}&medicine_name=${medicine_name}`;

            window.location.href = url;
        });
        // Excel export
        $(document).on('click', '#exportExcel', function(e){
            e.preventDefault();

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const supplier_id = $("#select_supplier_id").val();
            const user_id = $("#select_user_id").val();
            const status = $("#select_status").val();
            const medicine_group = $("#select_medicine_group").val();
            const medicine_dosage = $("#select_medicine_dosage").val();
            const medicine_origin = $("#select_medicine_origin").val();
            const medicine_name = $("#select_medicine_name").val();
            const inv_id = $("#input_inventory_search").val();

            const url = '{{ route("inventory-details-record_excel.action") }}?' +
                `start_date=${start_date}&end_date=${end_date}&user_id=${user_id}&inv_id=${inv_id}&status=${status}` +
                `&supplier_id=${supplier_id}&medicine_group=${medicine_group}&medicine_dosage=${medicine_dosage}` +
                `&medicine_origin=${medicine_origin}&medicine_name=${medicine_name}`;

            window.location.href = url;
        });

        // Excle export cvs format
        $(document).on('click', '#exportCsv', function(e){
            e.preventDefault();

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const supplier_id = $("#select_supplier_id").val();
            const user_id = $("#select_user_id").val();
            const status = $("#select_status").val();
            const medicine_group = $("#select_medicine_group").val();
            const medicine_dosage = $("#select_medicine_dosage").val();
            const medicine_origin = $("#select_medicine_origin").val();
            const medicine_name = $("#select_medicine_name").val();
            const inv_id = $("#input_inventory_search").val();

            const url = '{{ route("inventory-details-record_cvs_file.action") }}?' +
                `start_date=${start_date}&end_date=${end_date}&user_id=${user_id}&inv_id=${inv_id}&status=${status}` +
                `&supplier_id=${supplier_id}&medicine_group=${medicine_group}&medicine_dosage=${medicine_dosage}` +
                `&medicine_origin=${medicine_origin}&medicine_name=${medicine_name}`;

            window.location.href = url;
        });

        // Screen Print 
        // document.getElementById('printBtn').addEventListener('click', function(e) {
        //     e.preventDefault();

        //     const start_date = $("#start_of_date").val();
        //     const end_date = $("#end_of_date").val();
        //     const supplier_id = $("#select_supplier_id").val();
        //     const user_id = $("#select_user_id").val();
        //     const status = $("#select_status").val();
        //     const medicine_group = $("#select_medicine_group").val();
        //     const medicine_dosage = $("#select_medicine_dosage").val();
        //     const medicine_origin = $("#select_medicine_origin").val();
        //     const medicine_name = $("#select_medicine_name").val();
        //     const inv_id = $("#input_inventory_search").val();

        //     const url = '{{ route("inventory-details-record.print") }}?' +
        //         `start_date=${start_date}&end_date=${end_date}&user_id=${user_id}&inv_id=${inv_id}&status=${status}` +
        //         `&supplier_id=${supplier_id}&medicine_group=${medicine_group}&medicine_dosage=${medicine_dosage}` +
        //         `&medicine_origin=${medicine_origin}&medicine_name=${medicine_name}`;
        //     window.open(url, '_blank');

        //     const printWindow = window.open(url, '_blank');
        //     printWindow.onload = function() {
        //         printWindow.print();
        //     };
            
        // });

        document.getElementById('printBtn').addEventListener('click', function(e) {
            e.preventDefault();

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const supplier_id = $("#select_supplier_id").val();
            const user_id = $("#select_user_id").val();
            const status = $("#select_status").val();
            const medicine_group = $("#select_medicine_group").val();
            const medicine_dosage = $("#select_medicine_dosage").val();
            const medicine_origin = $("#select_medicine_origin").val();
            const medicine_name = $("#select_medicine_name").val();
            const inv_id = $("#input_inventory_search").val();

            const url = '{{ route("inventory-details-record.print") }}?' +
                `start_date=${start_date}&end_date=${end_date}&user_id=${user_id}&inv_id=${inv_id}&status=${status}` +
                `&supplier_id=${supplier_id}&medicine_group=${medicine_group}&medicine_dosage=${medicine_dosage}` +
                `&medicine_origin=${medicine_origin}&medicine_name=${medicine_name}`;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modal-content').innerHTML = data;
                    $('#printModal').modal('show');
                })
                .catch(error => console.error('Error:', error));
        });
        
    });

</script>