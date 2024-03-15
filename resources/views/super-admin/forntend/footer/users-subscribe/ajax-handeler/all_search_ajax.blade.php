<script>
    // Define a function to format the date
    const formatDate = (dateString) => {
    const date = new Date(dateString);
    
    // Format date as dd-mm-yyyy
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
    const year = date.getFullYear();

    // Format time as hh:mm am/pm
    let hours = date.getHours();
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight
    const time = hours.toString().padStart(2, '0') + ':' + minutes + ' ' + ampm;

    return `${day}-${month}-${year} ${time}`; // Concatenate date and time
    };
    // Example usage:
    console.log(formatDate('2024-02-25T12:30:00')); // Output: 25-02-2024 12:30 pm

    $(document).ready(function() {
        $(document).load('click', function(){
            $("#loader_postdelete").addClass('loader_chart');
        });
    });
</script>

<script>
    // Search-Button loader
    $("#filter").on('click',()=> {
        $('.search-order-icon').removeClass('search-order-hidden');
        $(this).attr('disabled',true);

        $(".search-signal").addClass('search-signal-classic');

        setTimeout(() => {
            $('.search-order-icon').addClass('search-order-hidden');
            $(this).attr('disabled',false);
            $(".search-signal").addClass('search-signal-classic');
        }, 3000);
    });
    $("#refresh").on('click',()=> {
        $('.search-refresh-icon').removeClass('search-refresh-hidden');
        $(this).attr('disabled',true);
        $(".refresh-signal").addClass("refresh-signal-classic");

        setTimeout(() => {
            $('.search-refresh-icon').addClass('search-refresh-hidden');
            $(this).attr('disabled',false);
            $(".refresh-signal").removeClass("refresh-signal-classic");
        }, 3000);
    });

    $("#export").on('click',()=> {
        $('.search-export-icon').removeClass('search-export-hidden');
        $(this).attr('disabled',true);

        setTimeout(() => {
            $('.search-export-icon').addClass('search-export-hidden');
            $(this).attr('disabled',false);
        }, 3000);
    });

    $(".printBtn").on('click', function(){
        $('.search-print-icon').removeClass('.search-print-hidden');
        $(this).attr('disabled', true);

        setTimeout(() => {
            $('.search-print-icon').addClass('.search-print-hidden');
            $(this).attr('disabled', false); 
        }, 3000);
    });
</script>
<script>
    $(document).ready(function() {
        $('#start_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Function to show the loading icon
        // spinner: "fa fa-spinner fa-spin"
        function showLoadingIcon(iconId) {
            $("#" + iconId).addClass("fa-solid fa-feather-pointed");
        }

        // Function to hide the loading icon
        function hideLoadingIcon(iconId) {
            $("#" + iconId).removeClass("fa-solid fa-feather-pointed");
        }
        // AJAX request for PDF Download
        $(".exportPdf").hover(function() {
            showLoadingIcon("pdfIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("pdfIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("pdfIcon");
                }
            });
        });

        // AJAX request for Excel Download
        $("#exportExcel").hover(function() {
            showLoadingIcon("excelIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("excelIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("excelIcon");
                }
            });
        });

        // AJAX request for CSV Download
        $("#exportCsv").hover(function() {
            showLoadingIcon("csvIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("csvIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("csvIcon");
                }
            });
        });

        // AJAX request for Screen Print
        $("#printBtn").hover(function() {
            showLoadingIcon("printIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("printIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("printIcon");
                }
            });
        });
    });

</script>
<script>
    // skeletone
    $(document).ready(function(){
        $(document).on('click', '.exportDropdown', function(){

            $(".export-signal").toggleClass('export-button-classic');

            var time = null;
            $("#pdfText").addClass('pdf-skeletone');
            $(".pdf").removeClass('pdf-title');
            $("#excelText").addClass('pdf-skeletone');
            $(".excel").removeClass('excel-title');
            $("#cvsText").addClass('cvs-skeletone');
            $(".cvs").removeClass('cvs-title');
            $("#printText").addClass('print-skeletone');
            $(".print").removeClass('print-title');

            time = setTimeout(() => {
                $("#pdfText").removeClass('pdf-skeletone');
                $(".pdf").addClass('pdf-title');
                $("#excelText").removeClass('pdf-skeletone');
                $(".excel").addClass('excel-title');
                $("#cvsText").removeClass('cvs-skeletone');
                $(".cvs").addClass('cvs-title');
                $("#printText").removeClass('print-skeletone');
                $(".print").addClass('print-title');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // History button
        $(document).on('click', '#history', function(){

            var time = null;

            $(".history-signal").removeClass('history-signal-classic-hidden');
            $(".history-signal").addClass('history-signal-classic');

            time = setTimeout(() => {
                $(".history-signal").addClass('history-signal-classic-hidden');
                $(".history-signal").removeClass('history-signal-classic');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // show history modal
        $(document).on('click', '.histoy', function(event){
            event.preventDefault();
            $("#historyModal").modal('show');
        });
    });


</script>
