@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Change Password') }}
    </h2>
    <form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('put') <!-- Use PUT aqui em vez de PATCH -->
    <!-- Campos do formulário -->
    <div class="mt-4">
        <label for="current_password" class="block font-medium text-sm text-gray-700">{{ __('Current Password') }}</label>
        <input id="current_password" name="current_password" type="password" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('current_password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password" class="block font-medium text-sm text-gray-700">{{ __('New Password') }}</label>
        <input id="password" name="password" type="password" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">{{ __('Confirm New Password') }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('password_confirmation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50">
            {{ __('Save Changes') }}
        </button>
    </div>
</form>

@endsection
