<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://sadasa.id/frontend/assets/images/logo/logo-sadasa-circle.png" class="logo" alt="Sadasa Academy Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
