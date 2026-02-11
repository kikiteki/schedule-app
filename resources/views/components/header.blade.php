<header class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Schedule App</h1>

        <nav class="flex items-center space-x-4 text-sm">
            <a href="#" class="hover:text-gray-300">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    ログアウト
                </button>
            </form>
        </nav>
    </div>
</header>
