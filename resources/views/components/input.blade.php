@props(['prop', 'value', 'input'])
<div class="mb-6">
    <label class="block mb-2 font-bold text-xs text-gray-700"
           for="{{$prop}}">
        {{ ucwords($value) }}
    </label>
    <input class="border border-gray-400 p-2 w-full"
           type="{{$prop}}"
           name="{{$prop}}"
           id="{{$prop}}"
           @if(isset($input))
           value="{{ $input->$prop }}"
           @endif
        value="{{old($prop)}}"
           >
    @error($prop)
    @if($prop=='password')
        <p class="text-red-500 text-xs mt-1">En az 8, en fazla 20 karakter giriniz.</p>
    @elseif($prop=='email')
        <p class="text-red-500 text-xs mt-1">Bu e-mail kullanılamaz.</p>
    @elseif($prop=='phone')
        <p class="text-red-500 text-xs mt-1">Bu numara kullanılamaz.</p>
    @else
        <p class="text-red-500 text-xs mt-1">Bu alan boş bırakılamaz.</p>
    @endif
    @enderror
</div>
