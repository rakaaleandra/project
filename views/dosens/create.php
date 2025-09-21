<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="flex items-start justify-center bg-gray-100 mt-8">
    <div class="max-w-2xl w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 flex items-center justify-center gap-2">
                <i data-lucide="graduation-cap" class="w-6 h-6"></i> Tambah Dosen
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

            <form action="/project/dosen/store" method="POST" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">

                <div>
                    <label class="block mb-1 font-medium text-gray-700">NIP:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="id-card" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="nip" value="<?= htmlspecialchars($old['nip'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nama:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="user" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="nama" value="<?= htmlspecialchars($old['nama'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Alamat:</label>
                    <div class="flex items-center border rounded px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="map-pin" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text" name="alamat" value="<?= htmlspecialchars($old['alamat'] ?? ''); ?>"
                            required class="w-full py-2 outline-none">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                        <i data-lucide="save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/components/footer.php'; ?>