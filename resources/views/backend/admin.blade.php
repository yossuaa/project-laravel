<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">

    <title>Admin Dashboardd</title>
    @vite('resources/css/app.css')

    <style>
        body { font-family: "SF Pro", sans-serif; }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen">

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboardd</h1>
        {{ $slot }}
    </div>

</body>
</html>
