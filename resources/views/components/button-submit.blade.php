@props(['color', 'value', 'width'])
<button
    @if(isset($width))
    style="width: {{$width}}px"
    @else
        {{""}}
    @endif
    type="submit"
        class="border rounded p-1 bg-{{$color}}-700 hover:bg-{{$color}}-800 border-{{$color}}-900 text-white"
>{{$value}}</button>
