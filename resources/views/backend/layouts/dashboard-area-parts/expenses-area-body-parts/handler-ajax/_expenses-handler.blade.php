<script>
    // Monthly Expenses-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault10', function(){
            $("#expneses_details_form").modal('show');
            $("#expensesTable").addClass('skeleton-children');
        });
    });
    // Payable Expenses-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault11', function(){
            $("#payable_expneses_details_form").modal('show');
            $("#expensesTableTwo").addClass('skeleton-children');
        });
    });
    // Today Expenses-Details Modal=============
    $(document).ready(function(){
        $(document).on('click', '#flexSwitchCheckDefault12', function(){
            $("#today_expneses_details_form").modal('show');
            $("#expensesTableThree").addClass('skeleton-children');
        });
    });
</script>