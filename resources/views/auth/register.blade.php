@extends('layouts.bar')

@section('content')
    <div class="flex items-center justify-center py-8">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Create Your Account</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-md transition-all duration-300 focus:outline-none focus:border-blue-500"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-md transition-all duration-300 focus:outline-none focus:border-blue-500"
                        value="{{ old('email') }}">
                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 border rounded-md pr-10 transition-all duration-300 focus:outline-none focus:border-blue-500">
                        <button type="button"
                            class="absolute inset-y-0 right-0 px-3 py-2 bg-transparent focus:outline-none"
                            onclick="togglePasswordVisibility()">
                            <i id="togglePasswordIcon" class="fa-regular fa-eye"></i>
                        </button>
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="bg-black text-white hover:bg-gray-800 px-4 py-2 rounded-md">Register</button>
            </form>

            <p class="mt-4 text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}"
                    class="text-blue-500 transition-all duration-300 hover:text-blue-700">Sign In</a></p>
        </div>
    </div>
@endsection