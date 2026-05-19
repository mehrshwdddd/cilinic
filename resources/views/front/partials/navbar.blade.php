<nav class="bg-white shadow mb-4">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-cyan-600">

            Clinic System

        </h1>

        <div class="flex items-center gap-4">

            @auth

                <a href="{{ route('dashboard') }}"
                   class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl transition">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-xl transition">
                    Login
                </a>

            @endauth

        </div>

    </div>

</nav>
