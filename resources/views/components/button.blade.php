@props(['color', 'value', 'link', 'width'])
<a
    @if(isset($width))
        style="width: {{$width}}px"
    @else
        {{""}}
    @endif
    class="border rounded p-1 bg-{{$color}}-700 hover:bg-{{$color}}-800 border-{{$color}}-900 text-white"
   href="/{{$link}}" >{{$value}} </a>
