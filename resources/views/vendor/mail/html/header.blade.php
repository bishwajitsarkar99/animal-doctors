<tr>
<td class="header">
<!-- href="{{$url}}" -->
<a class="image-area" href="#" style="display: inline-block;">
<img src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" class="logo" alt="Laravel Logo">
</a><br>
<span class="sending-date">
    <span class="serv">
        <?php
        $timezone = date_default_timezone_get();
        echo "Date :";
        ?>
    </span>
    <?php
    date_default_timezone_set('Asia/Dhaka');
    echo date('d l M Y') . " ; ";
    echo date("h:i:sA");
    ?>
</span>
</td>
</tr>
