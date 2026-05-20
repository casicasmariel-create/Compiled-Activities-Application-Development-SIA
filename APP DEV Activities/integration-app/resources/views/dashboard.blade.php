@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-pink-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-pink-500 via-fuchsia-500 to-rose-400 text-white shadow-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-extrabold tracking-wide">
                ✨ Dashboard
            </h1>

            <div class="flex items-center gap-4">

                <span class="font-medium">
                    Welcome, {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-white text-pink-600 hover:bg-pink-100 px-5 py-2 rounded-xl font-semibold transition duration-300">
                        Logout
                    </button>

                </form>

            </div>

        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6">

        <!-- User Profile -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg p-6 mb-8 border border-pink-200">

            <h2 class="text-3xl font-bold mb-6 text-pink-600">
                🌸 User Profile
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-pink-100 p-5 rounded-2xl shadow-sm">
                    <p class="text-pink-500 font-medium">Full Name</p>

                    <h3 class="text-xl font-bold text-pink-800">
                        {{ auth()->user()->name }}
                    </h3>
                </div>

                <div class="bg-pink-100 p-5 rounded-2xl shadow-sm">
                    <p class="text-pink-500 font-medium">Email</p>

                    <h3 class="text-xl font-bold text-pink-800">
                        {{ auth()->user()->email }}
                    </h3>
                </div>

                <div class="bg-pink-100 p-5 rounded-2xl shadow-sm">
                    <p class="text-pink-500 font-medium">Role</p>

                    <h3 class="text-xl font-bold text-pink-800 capitalize">
                        {{ auth()->user()->role }}
                    </h3>
                </div>

            </div>

        </div>

        <!-- Search -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg p-6 mb-8 border border-pink-200">

            <h2 class="text-3xl font-bold mb-5 text-pink-600">
                🔍 Search Users
            </h2>

            <form method="GET" action="/dashboard" class="flex gap-4">

                <input
                    type="text"
                    name="search"
                    placeholder="Enter user name..."
                    class="border border-pink-300 focus:border-pink-500 focus:ring-pink-400 rounded-xl px-4 py-3 w-full">

                <button
                    type="submit"
                    class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                    Search
                </button>

            </form>

        </div>

        <!-- Users Table -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg p-6 mb-8 overflow-x-auto border border-pink-200">

            <h2 class="text-3xl font-bold mb-5 text-pink-600">
                👩‍💻 Registered Users
            </h2>

            <table class="w-full border-collapse overflow-hidden rounded-2xl">

                <thead>
                    <tr class="bg-gradient-to-r from-pink-500 to-rose-400 text-white">
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Role</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($users as $user)

                    <tr class="border-b hover:bg-pink-50 transition">

                        <td class="p-4">{{ $user->name }}</td>

                        <td class="p-4">{{ $user->email }}</td>

                        <td class="p-4 capitalize">
                            <span class="bg-pink-200 text-pink-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $user->role }}
                            </span>
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- Motivational Quotes Section -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg p-6 border border-pink-200">

            <h2 class="text-3xl font-bold mb-6 text-pink-600">
                ✨ Daily Motivational Quotes
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($posts as $quote)

                <div class="bg-gradient-to-br from-pink-400 via-fuchsia-500 to-rose-400 text-white rounded-3xl p-6 shadow-lg hover:scale-105 hover:shadow-2xl transition duration-300">

                <div class="text-6xl opacity-30 mb-3">
                    ❝
                </div>

                <p class="text-lg leading-relaxed mb-6 font-medium">
                    {{ $quote['quote'] }}
                </p>

                <div class="border-t border-white/30 pt-4">

                    <p class="font-bold text-right text-pink-100">
                        — {{ $quote['author'] }}
                    </p>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>