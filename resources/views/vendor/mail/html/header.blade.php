@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://lets.getpress.ai/images/GetPress_logo_50.png" alt="GetPress.ai">
@else
<img src="https://lets.getpress.ai/images/GetPress_logo_50.png" alt="GetPress.ai">
@endif
</a>
</td>
</tr>
