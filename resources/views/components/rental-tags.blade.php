{{-- to access the tags from the db as they are separated by a comma --}}
@props(['tagsCsv'])

{{-- an array to loop through the tags in the php directive --}}
@php
// create variable
//explode function shows us where to split the string and what to pass as the second argument
$tags= explode(',', $tagsCsv)
    
@endphp

<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
   @endforeach
</ul>