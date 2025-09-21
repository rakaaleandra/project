<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="flex items-start justify-center bg-gray-100 mt-8">
    <div class="max-w-2xl w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center flex items-center justify-center gap-2">
                <i data-lucide="clipboard-list" class="w-7 h-7"></i> Tambah Nilai Mahasiswa
            </h2>

            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                    <ul class="list-disc list-inside text-sm">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/project/kuliah/store" method="POST" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">
                <div>
                    <label class="block text-gray-700 mb-1 font-medium">NIM:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="id-card" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_nim" value="<?= htmlspecialchars($old['fk_nim'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Kode Mata Kuliah:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="book-open" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_kode_matkul" value="<?= htmlspecialchars($old['fk_kode_matkul'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1 font-medium">NIP:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="user" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="fk_nip" value="<?= htmlspecialchars($old['fk_nip'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Nilai:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="check-circle" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="nilai" value="<?= htmlspecialchars($old['nilai'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                        <i data-lucide="save"></i> Simpan
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