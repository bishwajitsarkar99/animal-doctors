<script>
    // switch on/off----- orders Area
    function myOrderFunction() {
        var x = document.getElementById("span1");
        if (x.innerHTML === "off") {
            x.innerHTML = "on";
        } else {
            x.innerHTML = "off";
        }


    }
    // switch on/off----- sales Area
    function mySlFunction() {
        var x = document.getElementById("span2");
        if (x.innerHTML === "off") {
            x.innerHTML = "on";
        } else {
            x.innerHTML = "off";
        }
    }
    // switch on/off----- expenses Area
    function myExFunction() {
        var x = document.getElementById("span3");
        if (x.innerHTML === "off") {
            x.innerHTML = "on";
        } else {
            x.innerHTML = "off";
        }
    }
    
    $(document).ready(function() {

        $("#order_part_loader").hide();
        $("#loader_sales_part").hide();
        $("#loader_expenses_part").hide();

        $("#totalOrder_box").addClass('order_box');
        $("#totalOrder").addClass('order_part');

        $(document).on('click', '#orders_box', function() {
            $("#order_part_loader").toggle('slow');
            $("#span1").toggleClass("on_switch");
        });

        $(document).on('click', '#orders_box2', function() {
            $("#loader_sales_part").toggle('slow');
            $("#span2").toggleClass("on_switch2");
        });

        $(document).on('click', '#orders_box3', function() {
            $("#loader_expenses_part").toggle('slow');
            $("#span3").toggleClass("on_switch3");
        });

        // Loader Order Chart=======
        $("#loader_orderChart").addClass('loader_chart');

    });

    // Dashboard Main Result Box(Pending Order-Part)-----------------
    $(document).ready(function() {
        $("#totalPending_box").addClass('pendingorder_box');

    });
    // Dashboard Main Result Box(Complete Order-Part)-----------------
    $(document).ready(function() {
        $("#completeOrder").addClass('completeorder_box');

    });
    // Dashboard Main Result Box(Reject Order-Part)-----------------
    $(document).ready(function() {
        $("#rejectOrder").addClass('rejectorder_box');

    });
    // Dashboard Main Result Box(Sales Order-Part)-----------------
    $(document).ready(function() {

        $("#totalSales").addClass('salesorder_box');
        $("#totalsales").addClass('order_part');

        // Loader Sales Chart=======
        $("#loader_salesChart").addClass('loader_saleschart');

    });

    // Loader Expenses Chart=======
    $(document).ready(function() {
        $("#loader_expensesChart").addClass('loader_expenseschart');
    });

    // Dashboard Main Result Box(Reject Order-Part)-----------------
    $(document).ready(function() {
        $("#totalExpenses").addClass('expensesorder_box');
        $("#totalexpenses").addClass('order_part');
    });
</script>

<script>
    // Full Screen--------------
    var screenMode = document.getElementById("myscreen");
    //open
    function openFullscreen() {
        if (screenMode.requestFullscreen) {
            screenMode.requestFullscreen();

        } else if (screenMode.webkitRequestFullScreen) {
            screenMode.webkitRequestFullScreen();
        } else if (screenMode.msRequestFullScreen) {
            screenMode.msRequestFullScreen();
        }

    }

    // close
    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE11 */
            document.msExitFullscreen();
        }
    }
</script>

<script>
    // Order-Summary-Details------------
    $(document).ready(function() {
        $("#displayOrder").show();
        $("#orderChart").show();
        $("#displaySummary").hide();
        $(document).on('click', '#onclick', function() {
            $("#displayOrder").toggle('slow');
            $("#orderChart").toggle('slow');
            $("#displaySummary").toggle();
        });
    });
</script>

<script>
    // Sales-Summary-Details------------
    $(document).ready(function() {
        $("#dispaySales").show();
        $("#dispaySalesChart").show();
        $("#displaysalesSummary").hide();
        $(document).on('click', '#salesDetls_btn', function() {
            $("#dispaySales").toggle('slow');
            $("#dispaySalesChart").toggle('slow');
            $("#displaysalesSummary").toggle();
        });
    });

</script>

<script>
    // Expenses-Summary-Details------------
    $(document).ready(function() {
        $("#expensesDisplay").show();
        $("#expensesChart").show();
        $("#displayExpensesSummary").hide();
        $(document).on('click', '#expenses_btn', function() {
            $("#expensesDisplay").toggle('slow');
            $("#expensesChart").toggle('slow');
            $("#displayExpensesSummary").toggle();
        });
    });
    
</script>

<script>
    $(document).ready(function(){
        $("#expenses_active").addClass('expenses-red');
    });
    // Expenses Pivot Table=======
    function openExpensesLink(evt, animName) {
        var i, x, tablinkexpense;
        x = document.getElementsByClassName("exp");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinkexpense = document.getElementsByClassName("tablinkexpenses");
        for (i = 0; i < x.length; i++) {
            tablinkexpense[i].className = tablinkexpense[i].className.replace(" expenses-red", "");
        }
        document.getElementById(animName).style.display = "block";
        evt.currentTarget.className += " expenses-red";
    }
</script>

<script>
    $(document).ready(function(){
        $("#order_active").addClass('order-seeblue');
    });
    // Order Pivot Table=======
    function openorderLink(evt, animName) {
        var i, x, tablinkexpense;
        x = document.getElementsByClassName("ord");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinkexpense = document.getElementsByClassName("tablinkorder");
        for (i = 0; i < x.length; i++) {
            tablinkexpense[i].className = tablinkexpense[i].className.replace(" order-seeblue", "");
        }
        document.getElementById(animName).style.display = "block";
        evt.currentTarget.className += " order-seeblue";
    }
</script>

<script>
    $(document).ready(function(){
        $("#sales_active").addClass('sales-seeblue');
    });
    // Sales Pivot Table=======
    function opensalesLink(evt, animName) {
        var i, x, tablinkexpense;
        x = document.getElementsByClassName("sal");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinkexpense = document.getElementsByClassName("tablinksales");
        for (i = 0; i < x.length; i++) {
            tablinkexpense[i].className = tablinkexpense[i].className.replace(" sales-seeblue", "");
        }
        document.getElementById(animName).style.display = "block";
        evt.currentTarget.className += " sales-seeblue";
    }
</script>

<script>
    $(document).ready(function(){
        $("#supplier_active").addClass('supplier-seeblue');
    });
    // Supplier summary =======
    function opensupplierLink(evt, animName) {
        var i, x, tablinksupplier;
        x = document.getElementsByClassName("supp");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinksupplier = document.getElementsByClassName("tablinksupplier");
        for (i = 0; i < x.length; i++) {
            tablinksupplier[i].className = tablinksupplier[i].className.replace(" supplier-seeblue", "");
        }
        document.getElementById(animName).style.display = "block";
        evt.currentTarget.className += " supplier-seeblue";
    }
</script>
