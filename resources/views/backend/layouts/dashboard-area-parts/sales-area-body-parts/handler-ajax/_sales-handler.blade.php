<script>
    // Monthly Sales-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault6', function(){
            $("#sales_details_form").modal('show');
            $("#salesMonthlyTable").addClass('skeleton-children');
        });
    });
    // Due Sales-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault7', function(){
            $("#due_sales_details_form").modal('show');
            $("#salesTable").addClass('skeleton-children');
        });
    });
    // Today Sales-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault8', function(){
            $("#today_sales_details_form").modal('show');
        });
    });
</script>