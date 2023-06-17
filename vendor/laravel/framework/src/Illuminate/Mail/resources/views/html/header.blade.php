@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{ $slot }}
@else
<img src="https://lh3.googleusercontent.com/pw/AJFCJaXXr5fWYE9BcANH18mcidnLLBlRbd0ymYoKauIaL5_P_WIAvyq_9MA7wUnHLuh_ogNe1UZR1wfZp2UDMKqqont7raA5j56CTCiqWJVKHHsVkIHveg=w2400" class="logo" alt="SERV Logo"><br>

@endif
</a>
</td>
</tr>
