@props(['name', 'placeholder' => ''])

    <x-form.container>
    @if($placeholder == '')
        <x-form.label name="{{ $name }}"/>
    @endif
    <textarea id="excerpt" cols="30" rows="5"
    type="text"
    name="{{$name}}"
    class="border border-gray-200 p-2 w-full"
    placeholder="{{ $placeholder }}"
    required
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
    </x-form.container>
