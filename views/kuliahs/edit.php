<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="flex items-start justify-center bg-gray-100 mt-8">
    <div class="max-w-2xl w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 flex items-center justify-center gap-2">
                <i data-lucide="book-open" class="w-6 h-6"></i> Edit Mata Kuliah
            </h2>

            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/project/kuliah/update/<?= $user['id']; ?>" method="POST" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">NIM Mahasiswa:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="id-card" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_nim" value="<?= htmlspecialchars($old['fk_nim'] ?? $user['fk_nim']); ?>" required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Kode Mata Kuliah:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="book-text" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_kode_matkul" value="<?= htmlspecialchars($old['fk_kode_matkul'] ?? $user['fk_kode_matkul']); ?>" required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">NIP Dosen:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="user" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_nip" value="<?= htmlspecialchars($old['fk_nip'] ?? $user['fk_nip']); ?>" required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nilai:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="edit-3" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="nilai" value="<?= htmlspecialchars($old['nilai'] ?? $user['nilai']); ?>" required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit" class="flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                        <i data-lucide="refresh-ccw"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

<?php require_once 'views/components/footer.php'; ?>