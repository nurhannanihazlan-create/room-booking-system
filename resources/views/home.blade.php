<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Room Booking System</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

<div class="min-h-screen flex items-center justify-center">

<div class="max-w-5xl w-full bg-white rounded-3xl shadow-xl overflow-hidden">

<div class="grid md:grid-cols-2">

<div class="bg-blue-600 text-white p-12">

<h1 class="text-5xl font-bold mb-6">

🏢 Room Booking System

</h1>

<p class="text-blue-100 text-lg">

Book meeting rooms easily, manage reservations,
and organize your workspace efficiently.

</p>

<div class="mt-10 space-y-4">

<div>✅ Room Management</div>

<div>✅ Booking Management</div>

<div>✅ Secure Authentication</div>

</div>

</div>

<div class="p-12 flex flex-col justify-center">

<h2 class="text-3xl font-bold text-gray-800">

Welcome

</h2>

<p class="text-gray-500 mt-2 mb-8">

Please login or create an account.

</p>

<a href="{{ route('login') }}"
class="bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-xl font-semibold">

Login

</a>

<a href="{{ route('register') }}"
class="mt-4 border border-blue-600 text-blue-600 hover:bg-blue-50 text-center py-3 rounded-xl font-semibold">

Register

</a>

</div>

</div>

</div>

</div>

</body>

</html>