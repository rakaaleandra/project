<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>CRUD Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-8">
        <?php if (isset($_SESSION['user_id'])): ?>
            <nav class="bg-white shadow rounded-lg mb-6">
                <div class="flex justify-between items-center px-6 py-3">
                    <div class="flex space-x-6 font-medium">
                        <a href="/sister"
                            class="flex items-center gap-2 px-2 py-1 rounded-md transition 
                            <?php echo ($_SERVER['REQUEST_URI'] == '/sister') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50'; ?>">
                            <i data-lucide="home"></i> Home
                        </a>
                        <a href="/project/mahasiswa/index"
                            class="flex items-center gap-2 px-2 py-1 rounded-md transition 
                            <?php echo (strpos($_SERVER['REQUEST_URI'], '/project/mahasiswa') === 0) ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50'; ?>">
                            <i data-lucide="users"></i> Mahasiswa
                        </a>
                        <a href="/project/matakuliah/index"
                            class="flex items-center gap-2 px-2 py-1 rounded-md transition 
                            <?php echo (strpos($_SERVER['REQUEST_URI'], '/project/matakuliah') === 0) ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50'; ?>">
                            <i data-lucide="book-open"></i> Mata Kuliah
                        </a>
                        <a href="/project/dosen/index"
                            class="flex items-center gap-2 px-2 py-1 rounded-md transition 
                            <?php echo (strpos($_SERVER['REQUEST_URI'], '/project/dosen') === 0) ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50'; ?>">
                            <i data-lucide="graduation-cap"></i> Dosen
                        </a>
                        <a href="/project/kuliah/index"
                            class="flex items-center gap-2 px-2 py-1 rounded-md transition 
                            <?php echo (strpos($_SERVER['REQUEST_URI'], '/project/kuliah') === 0) ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50'; ?>">
                            <i data-lucide="calendar"></i> Kuliah
                        </a>
                    </div>

                    <a href="/project/logout" class="flex items-center gap-2 text-red-500 hover:text-red-700 font-medium">
                        <i data-lucide="log-out"></i> Logout (<?php echo htmlspecialchars($_SESSION['user_name']); ?>)
                    </a>
                </div>
            </nav>
        <?php endif; ?>
    </div>

<script>
    lucide.createIcons();
</script>