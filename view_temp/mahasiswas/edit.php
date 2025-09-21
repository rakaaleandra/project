<?php
require_once 'views/components/header.php';
require_once 'models/Auth.php';
$auth = new Auth($pdo);
?>

<div class="flex items-start justify-center bg-gray-100 min-h-screen py-10">
    <div class="max-w-lg w-full bg-gradient-to-r from-blue-50 to-blue-100 p-1 rounded-2xl shadow-lg">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-blue-600 flex items-center justify-center gap-2">
                <i data-lucide="edit-3" class="w-7 h-7"></i> Edit Mahasiswa
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

            <form action="/project/update/<?= $user['nim']; ?>" method="POST" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?= $auth->generateCsrfToken(); ?>">
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Nama</label>
                    <div class="flex items-center border rounded-lg px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="user" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text"
                            name="nama"
                            value="<?= htmlspecialchars($old['nama'] ?? $user['nama']); ?>"
                            required
                            class="w-full py-2 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Alamat</label>
                    <div class="flex items-center border rounded-lg px-3 focus-within:ring-2 focus-within:ring-blue-500">
                        <i data-lucide="map-pin" class="text-blue-500 w-5 h-5 mr-2"></i>
                        <input type="text"
                            name="alamat"
                            value="<?= htmlspecialchars($old['alamat'] ?? $user['alamat']); ?>"
                            required
                            class="w-full py-2 outline-none">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        name="submit"
                        class="flex items-center gap-2 bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 hover:shadow-md transition">
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