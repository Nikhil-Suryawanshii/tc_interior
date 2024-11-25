<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Adjust for your styles -->
</head>
<body>
    <div class="container mx-auto mt-20">
        <div class="w-full max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg shadow">
            <h2 class="text-center text-2xl font-bold mb-6">Seller Login</h2>
            <form method="POST" action="{{ route('seller.login') }}">
                @csrf
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required autofocus>
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                        Login
                    </button>
                </div>
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="text-red-500 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
