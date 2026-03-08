@props(['disabled' => false, 'type' => 'text', 'checked' => false, 'autocomplete' => 'off'])

@if($type === 'checkbox' || $type === 'radio')
<input @disabled($disabled) {{ $attributes->merge(['class' => '', 'type' => $type, 'checked' => $checked]) }}>
@else
<input @disabled($disabled) {{ $attributes->merge(['class' => 'input-text', 'type' => $type, 'autocomplete' =>
$autocomplete]) }}>
@endif