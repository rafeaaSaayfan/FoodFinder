<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset("css/theme.css") }}">
    <title>FoodFinder</title>
</head>

<body>
    <!-- component -->
    <main class="h-screen w-full flex flex-col justify-center items-center bg-pr">
        <h1 class="text-9xl font-extrabold text-white tracking-widest">404</h1>
        <div class="bg-ter px-2 text-sm rounded rotate-12 absolute">
            Page Not Found
        </div>
        <button class="mt-5">
            <a href="{{ route('home') }}"
                class="relative inline-block text-sm font-medium text-ter group active:text-orange-500 focus:outline-none focus:ring">
                <span
                    class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-ter group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span class="relative block px-8 py-3 bg-[#1A2238] border border-current">
                    <router-link to="">Go Home</router-link>
                </span>
            </a>
        </button>
    </main>
</body>

</html>
