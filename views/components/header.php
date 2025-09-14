<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-8">
        <nav class="mb-6">
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="flex space-x-4">
                    <li><a href="/project" class="text-blue-500 hover:underline">Home</a></li>
                    <li><a href="/project/logout" class="text-red-500 hover:underline inline">Logout (<?php echo htmlspecialchars($_SESSION['user_name']); ?>)</a></li>
                </ul>
                <div class="w-full flex flex-row mt-4 text-center font-bold bg-white rounded-lg shadow">
                    <a href="/project" class="basis-full p-2 hover:rounded-l-lg hover:bg-sky-500 hover:shadow hover:text-white">mahasiswa</a>
                    <a href="/project/matakuliah/index" class="basis-full p-2 hover:bg-sky-500 hover:shadow hover:text-white">mata kuliah</a>
                    <a href="/project/dosen/index" class="basis-full p-2 hover:bg-sky-500 hover:shadow hover:text-white">dosen</a>
                    <a href="/project/kuliah/index" class="basis-full p-2 hover:rounded-r-lg hover:bg-sky-500 hover:shadow hover:text-white">kuliah</a>
                </div>
            <?php else: ?>
                <ul class="flex space-x-4">
                    <li><a href="/project/login" class="text-blue-500 hover:underline">Login</a></li>
                    <li><a href="/project/register" class="text-blue-500 hover:underline">Register</a></li>
                </ul>
                <?php endif; ?>
        </nav>