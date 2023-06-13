<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        {{-- alpinejs --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        
        {{-- added tailwind using play cdn --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            // laravel: "#E94A0C",
                            laravel: "#008080",
                        },
                    },
                },
            };
        </script>
        <title>CarRentals | Find Cars To Rent</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/Logo3.jpeg')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                {{-- to be seen only when logged in --}}
                @auth

                <li>
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/rentals/manage/" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i></i>
                        Manage CarRentals</a
                    >
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                      <i class="fa fa-sign-out"></i>Logout
                    </button>
                    </form>
                </li>

                @else

                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-circle-user"></i></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
    <main>
    {{-- View Output --}}
    {{-- @yield('content') --}}
    {{-- since its a component use --}}
    {{$slot}}
    </main>

    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>

    <a
        href="/rentals/create"
        class="absolute top-1/3 right-10 bg-black text-red py-2 px-5"
        >Post Car</a
    >
</footer>
<x-flash-message/>
</body>
</html>