<x-layout>
{{-- @extends('layout')

@section('content') --}}

{{-- adding the hero section --}}
@include('partials._hero')

{{-- adding search bar --}}
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
{{-- @if(count($rentals)==0)
 <p>No rentals found </p>
@endif --}}

@unless(count($rentals)==0)

@foreach($rentals as $rental)
    {{-- to access items in the rental card --}}
    {{-- the var should have a :rental prefix so that it works --}}
    <x-rental-card :rental="$rental" />
@endforeach
    
@else
    <p>No listings found</p>
@endunless

</div>

{{-- to navigate the pages of the rentals --}}
<div class="mt-6 p-4">
 {{$rentals->links()}}
</div>
{{-- @endsection --}}

</x-layout>