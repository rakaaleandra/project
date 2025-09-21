<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="flex items-start justify-center bg-gray-100 min-h-screen py-10">
    <div class="max-w-lg w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-600 flex items-center justify-center gap-2">
                <i data-lucide="book-open-check" class="w-7 h-7"></i> Edit Mata Kuliah
            </h2>

            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside text-sm">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/project/matakuliah/update/<?= $user['kode_matkul']; ?>" method="POST" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">

                <div>
                    <label class="block mb-2 font-medium text-gray-700 flex items-center gap-2">
                        <i data-lucide="book-text" class="w-4 h-4 text-blue-500"></i> Nama Mata Kuliah
                    </label>
                    <input type="text"
                        name="nama_matkul"
                        value="<?= htmlspecialchars($old['nama_matkul'] ?? $user['nama_matkul']); ?>"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700 flex items-center gap-2">
                        <i data-lucide="layers" class="w-4 h-4 text-blue-500"></i> SKS
                    </label>
                    <input type="text"
                        name="sks"
                        value="<?= htmlspecialchars($old['sks'] ?? $user['sks']); ?>"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700 flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-blue-500"></i> Semester
                    </label>
                    <input type="text"
                        name="semester"
                        value="<?= htmlspecialchars($old['semester'] ?? $user['semester']); ?>"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="inline-flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 hover:shadow-md transition">
                        <i data-lucide="refresh-ccw"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>