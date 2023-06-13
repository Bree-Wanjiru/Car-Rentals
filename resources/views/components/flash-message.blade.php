{{-- check for the message --}}
@if(session()->has('message'))

 {{-- format it --}}
 {{-- added alpine js so that the message disappears and doesnt stay there till a page reload--}}
 {{-- x-data =Declare a new Alpine component and its data for a block of HTML --}}
 {{-- x-init =Run code when an element is initialized by Alpine --}}
 <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
<p>
    {{session('message')}}
</p>
 </div>
@endif