<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Tailwind CSS or Bootstrap -->
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white px-6 py-4 flex justify-between items-center">
        <div>
            <h1 class="text-lg font-bold">Admin Dashboard</h1>
        </div>
        <div>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>
    </nav>
    <main class="p-6">
        <h2 class="text-2xl font-bold mb-4">Welcome, {{ auth('admin')->user()->name }}</h2>
        <p>This is the admin dashboard. Customize it to fit your needs.</p>
    </main>
</body>
</html>
