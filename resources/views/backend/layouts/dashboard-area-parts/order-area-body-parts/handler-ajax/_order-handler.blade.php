<script>
    // Monthly Order-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault2', function(){
            $("#order_details_form").modal('show');
            $("#orderDetailsTable").addClass('skeleton-children');
        });
    });
    // Monthly Pending Order-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault3', function(){
            $("#order_pending_form").modal('show');
            $("#orderDetailsTableTwo").addClass('skeleton-children');
        });
    });
    // Today Order-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault4', function(){
            $("#today_order_form").modal('show');
            $("#orderDetailsTableThree").addClass('skeleton-children');
        });
    });
</script>