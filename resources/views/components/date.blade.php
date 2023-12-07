<!-- resources/views/components/date.blade.php -->
@props(['id', 'name', 'class'])

<input type="date" {{ $attributes->merge(['class' => 'form-input rounded-md '.$class]) }} id="{{ $id }}" name="{{ $name }}">
