@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{ $slot }}
@else
<img src="https://lh3.googleusercontent.com/iBlYbuuzkw59qXdTwC-CVw4QwhDe55djfYOEeVCL9vjVb_LwnuIEwCfeDUUhqZOKL_WFIOC9QunuTWIDSSY-oHvS4y5Sbj4TVC3BpJ95geIRCdLkO0D-AN52DOtkxFl9uQ=w1280" class="logo" alt="SERV Logo"><br>
{{--upload in google then get photo url by inspecting--}}
@endif
</a>
</td>
</tr>
