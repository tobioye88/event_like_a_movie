@props(['disabled' => false, 'required' => false])

<textarea @disabled($disabled) @required($required) {{ $attributes->merge(['class' => 'textarea']) }}></textarea>