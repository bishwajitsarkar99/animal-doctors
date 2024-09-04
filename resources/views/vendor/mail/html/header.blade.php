<tr>
<td class="header">
<!-- href="{{$url}}" -->
<a class="image-area" href="#" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
