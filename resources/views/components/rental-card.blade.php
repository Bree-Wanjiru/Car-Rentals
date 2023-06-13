 {{-- to access rental model use prop --}}
 @props(['rental'])
 
 <!-- Items-->
 <x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            {{-- src="{{asset('images/Toyota.png')}}" --}}
            src="{{$rental->logo ? asset('storage/'.$rental->logo) : asset('images/car.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/rentals/{{$rental->id}}">{{$rental->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$rental->company}}</div>
           
            {{-- calling the tag components --}}
            <x-rental-tags :tagsCsv="$rental->tags"/>
                
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$rental->location}}
            </div>
        </div>
    </div>
 </x-card>