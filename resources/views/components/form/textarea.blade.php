@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea class="w-full text-sm focus:outline-none focus:ring" name="{{ $name }}" id="{{ $name }}"
        rows="5" placeholder="" required>{{ old($name) }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
