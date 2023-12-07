@props(['id', 'name', 'class'])

<select {{ $attributes->merge(['class' => 'form-select '.$class]) }} id="{{ $id }}" name="{{ $name }}">
    {{ $slot }}
</select>
