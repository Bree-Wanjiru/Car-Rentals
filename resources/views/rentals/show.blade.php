<x-layout>
{{-- @extends('layout')

@section('content') --}}

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10 "> {{-- attributes can not be directly added to x-card , unless you make changes to card blade first so as to add directly --}}
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$rental->logo ? asset('storage/'.$rental->logo) : asset('images/Toyota.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$rental->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$rental->company}}</div>
                        
                          {{-- calling the tag components --}}
                            <x-rental-tags :tagsCsv="$rental->tags"/>

                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i>{{$rental->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Car Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$rental->description}}

                                <a
                                    href="mailto:{{$rental->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Seller</a
                                >

                                <a
                                    href="{{$rental->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>
                {{-- edit --}}
                {{-- <x-card class="mt-4 p-2 flex space-x-6">
                <a href="/rentals/{{$rental->id}}/edit">
                <i class="fa-solid fa-pencil"></i>Edit
                </a> --}}

                 {{-- delete --}}
                {{-- <form method="POST" action="/rentals/{{$rental->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form> --}}
                
             {{-- </x-card> --}}
            


                
            </div>

{{-- @endsection --}}
</x-layout>