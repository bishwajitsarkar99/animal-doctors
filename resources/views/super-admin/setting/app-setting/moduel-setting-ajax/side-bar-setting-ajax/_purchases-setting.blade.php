<script>
    // purchases moduel
    $(document).ready(function() {
        // sidebar purchases moduel
        $('#parent1').show();
        $('#parent2').hide();
        $('.child1').hide();
        $('.child2').hide();
        $(document).on('click', 'td.row_parent', function() {
            $('#parent1').toggle();
            $('#parent2').toggle();
            $('.child1').toggle();
            $('.child2').toggle();
        });
        // sidebar purchases sub moduel
        $('#parent3').show();
        $('#parent4').hide();
        $('.child3').hide();
        $('.child4').hide();
        $(document).on('click', 'tr.row_parent2', function() {
            $('#parent3').toggle();
            $('#parent4').toggle();
            $('.child3').toggle();
            $('.child4').toggle();
        });
        // sidebar product sub moduel
        $('#children1').show();
        $('#children2').hide();
        $('.children_siblink').hide();
        $('.children_siblink3').hide();
        $('.children_siblink4').hide();
        $('.children_siblink5').hide();
        $('.children_siblink6').hide();
        $('.children_siblink7').hide();
        $('.children_siblink8').hide();
        $('.children_siblink9').hide();
        $(document).on('click', 'td.productChild', function() {
            $('#children1').toggle();
            $('#children2').toggle();
            $('.children_siblink').toggle();
            $('.children_siblink3').toggle();
            $('.children_siblink4').toggle();
            $('.children_siblink5').toggle();
            $('.children_siblink6').toggle();
            $('.children_siblink7').toggle();
            $('.children_siblink8').toggle();
            $('.children_siblink9').toggle();
            $('.child1').toggleClass('bg-light-gray');
        });
        // sidebar category link
        $('#children3').show();
        $('#children4').hide();
        $('.children_link').hide();
        $(document).on('click', 'td.categoryChild', function() {
            $('#children3').toggle();
            $('#children4').toggle();
            $('.children_link').toggle();
            $('.children_siblink').toggleClass('select-bg');
        });
        // sidebar sub category link
        $('#children5').show();
        $('#children6').hide();
        $('.children_link2').hide();
        $(document).on('click', 'td.children_siblink2', function() {
            $('#children5').toggle();
            $('#children6').toggle();
            $('.children_link2').toggle();
            $('.children_siblink3').toggleClass('select-bg');
        });
        // sidebar group link
        $('#children7').show();
        $('#children8').hide();
        $('.children_link3').hide();
        $(document).on('click', 'td.children_siblink5', function() {
            $('#children7').toggle();
            $('#children8').toggle();
            $('.children_link3').toggle();
            $('.children_siblink4').toggleClass('select-bg');
            
        });
        // sidebar medicine link
        $('#children9').show();
        $('#children10').hide();
        $('.children_link4').hide();
        $('.children_dosage_link4').hide();
        $('.children_origin_link4').hide();
        $(document).on('click', 'td.children_siblink6', function() {
            $('#children9').toggle();
            $('#children10').toggle();
            $('.children_link4').toggle();
            $('.children_dosage_link4').toggle();
            $('.children_origin_link4').toggle();
            $('.children_siblink5').toggleClass('select-bg');
        });
        // sidebar model link
        $('#children11').show();
        $('#children12').hide();
        $('.children_link5').hide();
        $(document).on('click', 'td.children_siblink7', function() {
            $('#children11').toggle();
            $('#children12').toggle();
            $('.children_link5').toggle();
            $('.children_siblink6').toggleClass('select-bg');
        });
        // sidebar unit link
        $('#children13').show();
        $('#children14').hide();
        $('.children_link6').hide();
        $(document).on('click', 'td.children_siblink8', function() {
            $('#children13').toggle();
            $('#children14').toggle();
            $('.children_link6').toggle();
            $('.children_siblink7').toggleClass('select-bg');
        });
        // sidebar brand link
        $('#children15').show();
        $('#children16').hide();
        $('.children_link7').hide();
        $(document).on('click', 'td.children_siblink9', function() {
            $('#children15').toggle();
            $('#children16').toggle();
            $('.children_link7').toggle();
            $('.children_siblink8').toggleClass('select-bg');
        });
        // sidebar product link
        $('#children17').show();
        $('#children18').hide();
        $('.children_link8').hide();
        $(document).on('click', 'td.children_siblink10', function() {
            $('#children17').toggle();
            $('#children18').toggle();
            $('.children_link8').toggle();
            $('.children_siblink9').toggleClass('select-bg');
        });


        // sidebar stock sub moduel
        $('#children19').show();
        $('#children20').hide();
        $(document).on('click', 'tr.child2', function() {
            $('#children19').toggle();
            $('#children20').toggle();
            $('.child2').toggleClass('select-bg');
        });
        // sidebar stock children
        $('.stock_children_link').hide();
        $('.stock_children_link3').hide();
        $('.stock_children_link5').hide();
        $(document).on('click', 'td.children_siblink11', function() {
            $('.stock_children_link').toggle();
            $('.stock_children_link3').toggle();
            $('.stock_children_link5').toggle();
            
        });
        // sidebar stock link
        $('#children21').show();
        $('#children22').hide();
        $('.stock_children_link2').hide();
        $('.stock_children_link2a').hide();
        $('.stock_children_link2b').hide();
        $('.stock_children_link2c').hide();
        $('.stock_children_link2d').hide();
        $(document).on('click', 'td.children_siblink12', function() {
            $('#children21').toggle();
            $('#children22').toggle();
            $('.stock_children_link2').toggle();
            $('.stock_children_link2a').toggle();
            $('.stock_children_link2b').toggle();
            $('.stock_children_link2c').toggle();
            $('.stock_children_link2d').toggle();
            $('.stock_children_link').toggleClass('select-bg');
        });
        // sidebar inventory link
        $('#children23').show();
        $('#children24').hide();
        $('.stock_children_link4').hide();
        $('.stock_children_link4a').hide();
        $(document).on('click', 'td.children_siblink13', function() {
            $('#children23').toggle();
            $('#children24').toggle();
            $('.stock_children_link4').toggle();
            $('.stock_children_link4a').toggle();
            $('.stock_children_link3').toggleClass('select-bg');
        });
        // sidebar supplier link
        $('#children25').show();
        $('#children26').hide();
        $('.stock_children_link5a').hide();
        $('.stock_children_link5b').hide();
        $('.stock_children_link5c').hide();
        $(document).on('click', 'td.children_siblink14', function() {
            $('#children25').toggle();
            $('#children26').toggle();
            $('.stock_children_link5a').toggle();
            $('.stock_children_link5b').toggle();
            $('.stock_children_link5c').toggle();
            $('.stock_children_link5').toggleClass('select-bg');
        });

    });
</script>
<script type="text/javascript">
    //Setting Company Profile Button Mode
    $(document).ready(function() {
        $("#login_enable3").hide();
        $("#login_disable3").show();
        $("#login_enable3a").hide();
        $("#login_disable3a").show();
        $(document).on('click', '#profile_mode', function() {

            if ($("#profile_mode:checked").length > 0) {
                $(".profile_value").removeAttr('disabled');
            } else {
                $(".profile_value").attr('disabled', true);
            }

            $("#light_focus").toggleClass('light2-focus');
            $("#light_focus").addClass('light4-focus');
            $("#light_focus2").toggleClass('light2-focus');
            $("#light_focus2").addClass('light4-focus');
            $("#light_focus3").toggleClass('light2-focus');
            $("#light_focus3").addClass('light4-focus');
            $("#light_focus4").toggleClass('light2-focus');
            $("#light_focus4").addClass('light4-focus');
            $("#light_focus5").toggleClass('light2-focus');
            $("#light_focus5").addClass('light4-focus');
            $("#light_focus6a").toggleClass('light2-focus');
            $("#light_focus6a").addClass('light4-focus');
            
            $("#login_enable3").toggle();
            $("#login_disable3").toggle();
            $("#login_enable3a").toggle();
            $("#login_disable3a").toggle();
        });
        
        // Page Settng
        $("#login_enable").hide();
        $("#login_disable").show();

        $(document).on('click', '#page_mode', function(){
            if ($("#page_mode:checked").length > 0) {
                $(".page_value").removeAttr('disabled');
            } else {
                $(".page_value").attr('disabled', true);
            }

            $("#light_focus7a").toggleClass('light2-focus');
            $("#light_focus7a").addClass('light4-focus');
            $("#light_focus8a").toggleClass('light2-focus');
            $("#light_focus8a").addClass('light4-focus');
            $("#light_focus9a").toggleClass('light2-focus');
            $("#light_focus9a").addClass('light4-focus');
            $("#light_focus10a").toggleClass('light2-focus');
            $("#light_focus10a").addClass('light4-focus');
            $("#light_focus11a").toggleClass('light2-focus');
            $("#light_focus11a").addClass('light4-focus');
            $("#light_focus12a").toggleClass('light2-focus');
            $("#light_focus12a").addClass('light4-focus');
            $("#light_focus13a").toggleClass('light2-focus');
            $("#light_focus13a").addClass('light4-focus');
            $("#light_focus14a").toggleClass('light2-focus');
            $("#light_focus14a").addClass('light4-focus');

            
            $("#login_enable").toggle();
            $("#login_disable").toggle();

        });

        //Sidebar Setting Button Mode
        $("#login_enable4").hide();
        $("#login_disable4").show();
        $(document).on('click', '#sidebar_mode', function() {

            if ($("#sidebar_mode:checked").length > 0) {
                $(".purchases_moduel").removeAttr('disabled');
            } else {
                $(".purchases_moduel").attr('disabled', true);
            }
            $("#login_enable4").toggle();
            $("#login_disable4").toggle();
            $("#light_focus6").toggleClass('sidebar-focus');
            $("#light_focus6").toggleClass('sidebar-light-focus');
            $("#light_focus7").toggleClass('sidebar-focus');
            $("#light_focus7").toggleClass('sidebar-light-focus');
            $("#light_focus8").toggleClass('sidebar-focus');
            $("#light_focus8").toggleClass('sidebar-light-focus');
            $("#light_focus9").toggleClass('sidebar-focus');
            $("#light_focus9").toggleClass('sidebar-light-focus');
            $("#light_focus10").toggleClass('sidebar-focus');
            $("#light_focus10").toggleClass('sidebar-light-focus');
            $("#light_focus11").toggleClass('sidebar-focus');
            $("#light_focus11").toggleClass('sidebar-light-focus');
            $("#light_focus12").toggleClass('sidebar-focus');
            $("#light_focus12").toggleClass('sidebar-light-focus');
            $("#light_focus13").toggleClass('sidebar-focus');
            $("#light_focus13").toggleClass('sidebar-light-focus');
            $("#light_focus14").toggleClass('sidebar-focus');
            $("#light_focus14").toggleClass('sidebar-light-focus');
            $("#light_focus15").toggleClass('sidebar-focus');
            $("#light_focus15").toggleClass('sidebar-light-focus');
            $("#light_focus16").toggleClass('sidebar-focus');
            $("#light_focus16").toggleClass('sidebar-light-focus');
            $("#light_focus17").toggleClass('sidebar-focus');
            $("#light_focus17").toggleClass('sidebar-light-focus');
            $("#light_focus18").toggleClass('sidebar-focus');
            $("#light_focus18").toggleClass('sidebar-light-focus');
            $("#light_focus19").toggleClass('sidebar-focus');
            $("#light_focus19").toggleClass('sidebar-light-focus');
            $("#light_focus20").toggleClass('sidebar-focus');
            $("#light_focus20").toggleClass('sidebar-light-focus');
            $("#light_focus21").toggleClass('sidebar-focus');
            $("#light_focus21").toggleClass('sidebar-light-focus');
            $("#light_focus22").toggleClass('sidebar-focus');
            $("#light_focus22").toggleClass('sidebar-light-focus');
            $("#light_focus23").toggleClass('sidebar-focus');
            $("#light_focus23").toggleClass('sidebar-light-focus');
            $("#light_focus24").toggleClass('sidebar-focus');
            $("#light_focus24").toggleClass('sidebar-light-focus');
            $("#light_focus25").toggleClass('sidebar-focus');
            $("#light_focus25").toggleClass('sidebar-light-focus');
            $("#light_focus26").toggleClass('sidebar-focus');
            $("#light_focus26").toggleClass('sidebar-light-focus');
            $("#light_focus27").toggleClass('sidebar-focus');
            $("#light_focus27").toggleClass('sidebar-light-focus');
            $("#light_focus28").toggleClass('sidebar-focus');
            $("#light_focus28").toggleClass('sidebar-light-focus');
            $("#light_focus29").toggleClass('sidebar-focus');
            $("#light_focus29").toggleClass('sidebar-light-focus');
            $("#light_focus30").toggleClass('sidebar-focus');
            $("#light_focus30").toggleClass('sidebar-light-focus');
            $("#light_focus31").toggleClass('sidebar-focus');
            $("#light_focus31").toggleClass('sidebar-light-focus');
            $("#light_focus32").toggleClass('sidebar-focus');
            $("#light_focus32").toggleClass('sidebar-light-focus');
            $("#light_focus33").toggleClass('sidebar-focus');
            $("#light_focus33").toggleClass('sidebar-light-focus');
            $("#light_focus34").toggleClass('sidebar-focus');
            $("#light_focus34").toggleClass('sidebar-light-focus');
            $("#light_focus35").toggleClass('sidebar-focus');
            $("#light_focus35").toggleClass('sidebar-light-focus');
            $("#light_focus36").toggleClass('sidebar-focus');
            $("#light_focus36").toggleClass('sidebar-light-focus');
            $("#light_focus37").toggleClass('sidebar-focus');
            $("#light_focus37").toggleClass('sidebar-light-focus');
            $("#light_focus38").toggleClass('sidebar-focus');
            $("#light_focus38").toggleClass('sidebar-light-focus');
            $("#light_focus39").toggleClass('sidebar-focus');
            $("#light_focus39").toggleClass('sidebar-light-focus');
            $("#light_focus40").toggleClass('sidebar-focus');
            $("#light_focus40").toggleClass('sidebar-light-focus');
            $("#light_focus41").toggleClass('sidebar-focus');
            $("#light_focus41").toggleClass('sidebar-light-focus');
            $("#light_focus42").toggleClass('sidebar-focus');
            $("#light_focus42").toggleClass('sidebar-light-focus');
            $("#light_focus43").toggleClass('sidebar-focus');
            $("#light_focus43").toggleClass('sidebar-light-focus');
            $("#light_focus44").toggleClass('sidebar-focus');
            $("#light_focus44").toggleClass('sidebar-light-focus');
            $("#light_focus45").toggleClass('sidebar-focus');
            $("#light_focus45").toggleClass('sidebar-light-focus');
            $("#light_focus46").toggleClass('sidebar-focus');
            $("#light_focus46").toggleClass('sidebar-light-focus');
            $("#light_focus47").toggleClass('sidebar-focus');
            $("#light_focus47").toggleClass('sidebar-light-focus');
            $("#light_focus48").toggleClass('sidebar-focus');
            $("#light_focus48").toggleClass('sidebar-light-focus');
            $("#light_focus49").toggleClass('sidebar-focus');
            $("#light_focus49").toggleClass('sidebar-light-focus');
            $("#light_focus50").toggleClass('sidebar-focus');
            $("#light_focus50").toggleClass('sidebar-light-focus');
            $("#light_focus51").toggleClass('sidebar-focus');
            $("#light_focus51").toggleClass('sidebar-light-focus');
            $("#light_focus52").toggleClass('sidebar-focus');
            $("#light_focus52").toggleClass('sidebar-light-focus');
            $("#light_focus53").toggleClass('sidebar-focus');
            $("#light_focus53").toggleClass('sidebar-light-focus');
            $("#light_focus54").toggleClass('sidebar-focus');
            $("#light_focus54").toggleClass('sidebar-light-focus');
            $("#light_focus55").toggleClass('sidebar-focus');
            $("#light_focus55").toggleClass('sidebar-light-focus');
            $("#light_focus56").toggleClass('sidebar-focus');
            $("#light_focus56").toggleClass('sidebar-light-focus');
            $("#light_focus57").toggleClass('sidebar-focus');
            $("#light_focus57").toggleClass('sidebar-light-focus');
            $("#light_focus58").toggleClass('sidebar-focus');
            $("#light_focus58").toggleClass('sidebar-light-focus');
            $("#light_focus59").toggleClass('sidebar-focus');
            $("#light_focus59").toggleClass('sidebar-light-focus');
            $("#light_focus60").toggleClass('sidebar-focus');
            $("#light_focus60").toggleClass('sidebar-light-focus');
            $("#light_focus61").toggleClass('sidebar-focus');
            $("#light_focus61").toggleClass('sidebar-light-focus');
            $("#light_focus62").toggleClass('sidebar-focus');
            $("#light_focus62").toggleClass('sidebar-light-focus');
            $("#light_focus63").toggleClass('sidebar-focus');
            $("#light_focus63").toggleClass('sidebar-light-focus');
            $("#light_focus64").toggleClass('sidebar-focus');
            $("#light_focus64").toggleClass('sidebar-light-focus');
            $("#light_focus65").toggleClass('sidebar-focus');
            $("#light_focus65").toggleClass('sidebar-light-focus');
            $("#light_focus66").toggleClass('sidebar-focus');
            $("#light_focus66").toggleClass('sidebar-light-focus');
            $("#light_focus67").toggleClass('sidebar-focus');
            $("#light_focus67").toggleClass('sidebar-light-focus');
            $("#light_focus68").toggleClass('sidebar-focus');
            $("#light_focus68").toggleClass('sidebar-light-focus');
            $("#light_focus69").toggleClass('sidebar-focus');
            $("#light_focus69").toggleClass('sidebar-light-focus');
            $("#light_focus70").toggleClass('sidebar-focus');
            $("#light_focus70").toggleClass('sidebar-light-focus');
            $("#light_focus71").toggleClass('sidebar-focus');
            $("#light_focus71").toggleClass('sidebar-light-focus');
            $("#light_focus72").toggleClass('sidebar-focus');
            $("#light_focus72").toggleClass('sidebar-light-focus');
            $("#light_focus73").toggleClass('sidebar-focus');
            $("#light_focus73").toggleClass('sidebar-light-focus');
            $("#light_focus74").toggleClass('sidebar-focus');
            $("#light_focus74").toggleClass('sidebar-light-focus');
            $("#light_focus75").toggleClass('sidebar-focus');
            $("#light_focus75").toggleClass('sidebar-light-focus');
            $("#light_focus76").toggleClass('sidebar-focus');
            $("#light_focus76").toggleClass('sidebar-light-focus');
            $("#light_focus77").toggleClass('sidebar-focus');
            $("#light_focus77").toggleClass('sidebar-light-focus');
            $("#light_focus78").toggleClass('sidebar-focus');
            $("#light_focus78").toggleClass('sidebar-light-focus');
            $("#light_focus79").toggleClass('sidebar-focus');
            $("#light_focus79").toggleClass('sidebar-light-focus');
            $("#light_focus80").toggleClass('sidebar-focus');
            $("#light_focus80").toggleClass('sidebar-light-focus');
            $("#light_focus81").toggleClass('sidebar-focus');
            $("#light_focus81").toggleClass('sidebar-light-focus');
            $("#light_focus82").toggleClass('sidebar-focus');
            $("#light_focus82").toggleClass('sidebar-light-focus');
            $("#light_focus83").toggleClass('sidebar-focus');
            $("#light_focus83").toggleClass('sidebar-light-focus');
            $("#light_focus84").toggleClass('sidebar-focus');
            $("#light_focus84").toggleClass('sidebar-light-focus');
            $("#light_focus85").toggleClass('sidebar-focus');
            $("#light_focus85").toggleClass('sidebar-light-focus');
            $("#light_focus86").toggleClass('sidebar-focus');
            $("#light_focus86").toggleClass('sidebar-light-focus');
            $("#light_focus87").toggleClass('sidebar-focus');
            $("#light_focus87").toggleClass('sidebar-light-focus');
            $("#light_focus88").toggleClass('sidebar-focus');
            $("#light_focus88").toggleClass('sidebar-light-focus');
            $("#light_focus89").toggleClass('sidebar-focus');
            $("#light_focus89").toggleClass('sidebar-light-focus');
            $("#light_focus90").toggleClass('sidebar-focus');
            $("#light_focus90").toggleClass('sidebar-light-focus');
            $("#light_focus91").toggleClass('sidebar-focus');
            $("#light_focus91").toggleClass('sidebar-light-focus');
            $("#light_focus92").toggleClass('sidebar-focus');
            $("#light_focus92").toggleClass('sidebar-light-focus');
            $("#light_focus93").toggleClass('sidebar-focus');
            $("#light_focus93").toggleClass('sidebar-light-focus');
            $("#light_focus94").toggleClass('sidebar-focus');
            $("#light_focus94").toggleClass('sidebar-light-focus');
            $("#light_focus95").toggleClass('sidebar-focus');
            $("#light_focus95").toggleClass('sidebar-light-focus');
            $("#light_focus96").toggleClass('sidebar-focus');
            $("#light_focus96").toggleClass('sidebar-light-focus');
            $("#light_focus97").toggleClass('sidebar-focus');
            $("#light_focus97").toggleClass('sidebar-light-focus');
            $("#light_focus98").toggleClass('sidebar-focus');
            $("#light_focus98").toggleClass('sidebar-light-focus');
            $("#light_focus99").toggleClass('sidebar-focus');
            $("#light_focus99").toggleClass('sidebar-light-focus');
            $("#light_focus100").toggleClass('sidebar-focus');
            $("#light_focus100").toggleClass('sidebar-light-focus');
            $("#light_focus101").toggleClass('sidebar-focus');
            $("#light_focus101").toggleClass('sidebar-light-focus');
            $("#light_focus102").toggleClass('sidebar-focus');
            $("#light_focus102").toggleClass('sidebar-light-focus');
            $("#light_focus103").toggleClass('sidebar-focus');
            $("#light_focus103").toggleClass('sidebar-light-focus');
            $("#light_focus104").toggleClass('sidebar-focus');
            $("#light_focus104").toggleClass('sidebar-light-focus');
            $("#light_focus105").toggleClass('sidebar-focus');
            $("#light_focus105").toggleClass('sidebar-light-focus');
            $("#light_focus106").toggleClass('sidebar-focus');
            $("#light_focus106").toggleClass('sidebar-light-focus');
            $("#light_focus107").toggleClass('sidebar-focus');
            $("#light_focus107").toggleClass('sidebar-light-focus');
            $("#light_focus108").toggleClass('sidebar-focus');
            $("#light_focus108").toggleClass('sidebar-light-focus');
            $("#light_focus109").toggleClass('sidebar-focus');
            $("#light_focus109").toggleClass('sidebar-light-focus');
            $("#light_focus110").toggleClass('sidebar-focus');
            $("#light_focus110").toggleClass('sidebar-light-focus');
            $("#light_focus111").toggleClass('sidebar-focus');
            $("#light_focus111").toggleClass('sidebar-light-focus');
            $("#light_focus112").toggleClass('sidebar-focus');
            $("#light_focus112").toggleClass('sidebar-light-focus');
            $("#light_focus113").toggleClass('sidebar-focus');
            $("#light_focus113").toggleClass('sidebar-light-focus');
            $("#light_focus114").toggleClass('sidebar-focus');
            $("#light_focus114").toggleClass('sidebar-light-focus');
            $("#light_focus115").toggleClass('sidebar-focus');
            $("#light_focus115").toggleClass('sidebar-light-focus');
            $("#light_focus116").toggleClass('sidebar-focus');
            $("#light_focus116").toggleClass('sidebar-light-focus');
            $("#light_focus117").toggleClass('sidebar-focus');
            $("#light_focus117").toggleClass('sidebar-light-focus');
            $("#light_focus118").toggleClass('sidebar-focus');
            $("#light_focus118").toggleClass('sidebar-light-focus');
            $("#light_focushrm").toggleClass('sidebar-focus');
            $("#light_focushrm").toggleClass('sidebar-light-focus');
            $("#light_focushrm2").toggleClass('sidebar-focus');
            $("#light_focushrm2").toggleClass('sidebar-light-focus');
            $("#light_focusauth").toggleClass('sidebar-focus');
            $("#light_focusauth").toggleClass('sidebar-light-focus');
            $("#light_focusauth2").toggleClass('sidebar-focus');
            $("#light_focusauth2").toggleClass('sidebar-light-focus');
            $("#light_focuslayouts").toggleClass('sidebar-focus');
            $("#light_focuslayouts").toggleClass('sidebar-light-focus');
            $("#light_focuscomponents").toggleClass('sidebar-focus');
            $("#light_focuscomponents").toggleClass('sidebar-light-focus');
            
        });
    });
</script>
<script>
    //update loader======
    $(document).ready(() => {
        $(".update_btn").on('click', () => {
            $('.update-icon').removeClass('update-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Update...');

            setTimeout(() => {
                $('.update-icon').addClass('update-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Update');
            }, 3000);
        });
    });
</script>
<script>
    // skeleton
    function fetchData() {
        const allSkeleton = document.querySelectorAll('.skeleton')

        allSkeleton.forEach(item => {
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
    }, 1000);
</script>