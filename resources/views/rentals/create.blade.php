<x-layout>
<x-card class=" p-10  max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Post a car
                        </h2>
                        <p class="mb-4">Post a car to find a buyer</p>
                    </header>
{{-- if you have a file in your form ,add enctype attribute --}}
                    <form method="POST" action="/rentals" enctype="multipart/form-data">
                        {{-- directive to use with post method --}}
                        {{-- it prevents cross site scripting attack thus stops pple from submitting forms from their website to your website--}}
                        @csrf
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                value="{{old('company')}}"
                            />

                            {{-- error directive --}}
                            @error('company')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Car Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Volks Wagen, Maserati, Toyota"
                                value="{{old('title')}}"
                                />
                            {{-- error directive --}}
                            @error('title')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Car Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Moi Avenue,Nairobi.Kenya etc"
                                value="{{old('location')}}"
                                />
                            {{-- error directive --}}
                            @error('location')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                                {{-- placeholder="example@gmail.com" --}}
                            />
                            {{-- error directive --}}
                            @error('email')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                value="{{old('website')}}"
                            />
                            {{-- error directive --}}
                            @error('website')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)-Car Model Version
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: 2022, 2018, 2016, etc"
                                value="{{old('tags')}}"
                                />
                            {{-- error directive --}}
                            @error('tags')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                         <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div> 

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Car(s) Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include description of car, payment, etc"
                            >
                            
                            {{old('description')}}

                        </textarea>
                            {{-- error directive --}}
                            @error('description')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- <div class="mb-6">
                            <label for="image" class="inline-block text-lg mb-2">
                                Car Image
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="image"
                            />
                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>  --}}

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Rental
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card>
</x-layout>