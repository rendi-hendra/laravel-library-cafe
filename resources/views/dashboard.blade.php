<x-app-layout>
    <h1 class="text-xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</x-app-layout>
